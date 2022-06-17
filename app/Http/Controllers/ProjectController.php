<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FormEngine;
use App\Http\Controllers\System;
use App\Models\Activities;
use App\Models\ActivityCost;
use App\Models\ActivityCosts;
use App\Models\BroadCategories;
use App\Models\Donors;
use App\Models\GrantDocs;
use App\Models\Grants;
use App\Models\Projects;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $ProjectValidity = new System();

        $ProjectValidity->StartProjectValidity();

        $Count = Grants::whereDate('GrantExpiry', '<', date('Y-m-d'))
            ->where('status', 'valid')
            ->count();

        if ($Count > 0) {
            $Grants = Grants::whereDate('GrantExpiry', '<', date('Y-m-d'))
                ->where('status', 'valid')
                ->get();

            foreach ($Grants as $data) {
                $E = Grants::find($data->id);

                $E->status = 'expired';
                $E->save();
            }
        }

        /***next pub fun */
        $Count = Grants::where('status', 'valid')
            ->count();

        if ($Count > 0) {
            $Grants = Grants::where('status', 'valid')
                ->get();

            foreach ($Grants as $data) {
                $E = Grants::find($data->id);

                $ConExpiry = Carbon::createFromFormat('Y-m-d', $E->GrantExpiry);
                $DateNow   = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));

                $diff_in_months = $ConExpiry->diffInMonths($DateNow);

                if ($diff_in_months <= 3) {
                    $E->ValidityMonths = $diff_in_months;
                    $E->save();
                } else {
                    $E->ValidityMonths = $diff_in_months;
                    $E->save();
                }
            }
        }
    }

    public function MgtDonors()
    {
        $Donors    = Donors::all();
        $Countries = DB::table('countries')->select('langEN AS name')->get();

        $Form = new FormEngine();

        $rem = ['created_at', 'updated_at', 'Category', 'id', 'DID', 'Country'];

        $data = [
            'Title'     => 'Donor Settings',
            'Desc'      => 'Manage the donor records database',
            'Page'      => 'donors.MgtDonors',
            'rem'       => $rem,
            'Countries' => $Countries,
            'Donors'    => $Donors,
            'Form'      => $Form->Form('donors'),
        ];

        return view('scrn', $data);
    }

    public function NewDonor(Request $request)
    {
        $validated = $this->validate($request, [
            'Name'          => 'required|unique:donors',
            'DID'           => 'required|unique:donors',
            'Country'       => 'required',
            'Category'      => 'required',
            'Description'   => 'required',
            'Phone'         => 'required',
            'Email'         => 'required',
            'Address'       => 'required',
            'ContactPerson' => 'required',
        ]);

        $Donors = Donors::create($validated);

        return redirect()->back()
            ->with('status', 'The donor record has been created successfully.');
    }

    public function DelDonor($id)
    {
        Donors::find($id)->delete();

        return redirect()->back()
            ->with('status', 'The selected donor information was successfully deleted.');
    }

    public function GrantDatabase()
    {
        $Grants = Grants::all();
        $Donors = Donors::all();

        $Form = new FormEngine();

        $Currencies = DB::table('currencies')->get();

        $rem = ['created_at', 'AvailableGrantAmountInUgx', 'status', 'ValidityMonths', 'OriginalCurrency', 'Donor', 'AmountInUgx', 'updated_at', 'GrantCategory', 'id', 'GID', 'DID', 'Country'];

        $data = [
            'Title'      => 'Grant database | Amount Spent refers to the money captured as spent on record creation ',
            'Desc'       => 'Manage grant records and settings',
            'Page'       => 'grants.Mgt',
            'rem'        => $rem,
            'Currencies' => $Currencies,
            'Grants'     => $Grants,
            'Donors'     => $Donors,
            'Form'       => $Form->Form('grants'),

        ];

        return view('scrn', $data);
    }

    public function ReverseGrant($id)
    {
        Grants::find($id)->delete();

        return redirect()->back()
            ->with('status', 'The selected grant record was successfully deleted.');
    }

    public function NewGrant(Request $request)
    {
        $validated = $this->validate($request, [
            'GrantName'                    => 'required|unique:grants',
            'GID'                          => 'required|unique:grants',
            'GrantCategory'                => 'required',
            'OriginalAmount'               => 'required',
            'OriginalCurrency'             => 'required',
            'GrantStartDate'               => 'required',
            'GrantAmountAlreadySpentInUgx' => 'required',
            'OriginalExchangeRate'         => 'required',
            'GrantExpiry'                  => 'required',
            'GrantNumber'                  => 'required',
            'DetailedNotes'                => 'required',
            'Donor'                        => 'required',
        ]);

        $D = Donors::where('Name', $request->Donor)->first();

        $Grants = new Grants();

        /**UgxAmount */
        $UgxAmount = $request->OriginalAmount * $request->OriginalExchangeRate;
        /**UgxAmount */

        /**Available */
        $Available                         = $UgxAmount - $request->GrantAmountAlreadySpentInUgx;
        $Grants->AvailableGrantAmountInUgx = $Available;
        /**Available */

        /***Amount Spent */
        $Grants->GrantAmountAlreadySpentInUgx = $request->GrantAmountAlreadySpentInUgx;
        /***Amount Spent */

        /**AmountInUgx */
        $Grants->AmountInUgx = $UgxAmount;
        /**AmountInUgx */

        $Grants->GID                  = $request->GID;
        $Grants->GrantName            = $request->GrantName;
        $Grants->GrantCategory        = $request->GrantCategory;
        $Grants->OriginalAmount       = $request->OriginalAmount;
        $Grants->GrantExpiry          = $request->GrantExpiry;
        $Grants->OriginalCurrency     = $request->OriginalCurrency;
        $Grants->GrantStartDate       = $request->GrantStartDate;
        $Grants->OriginalExchangeRate = $request->OriginalExchangeRate;
        $Grants->GrantNumber          = $request->GrantNumber;
        $Grants->DetailedNotes        = $request->DetailedNotes;
        $Grants->Donor                = $request->Donor;
        $Grants->DID                  = $D->DID;
        //$Grants->GrantAmountAlreadySpentInUgx = $D->GrantAmountAlreadySpentInUgx;
        $Grants->AvailableGrantAmountInUgx = $UgxAmount - $request->GrantAmountAlreadySpentInUgx;
        $Grants->save();

        return redirect()->back()
            ->with('status', 'New grant record created successfully');
    }

    public function SelectGrant()
    {
        $Grants = Grants::all();

        $data = [
            'Title'  => 'Select grant to attach documentation to',
            'Desc'   => 'Grant documentation settings',
            'Page'   => 'grants.Select',
            'Grants' => $Grants,
        ];

        return view('scrn', $data);
    }

    public function GrantSelected(Request $request)
    {
        return redirect()->route('GrantDocs', ['id' => $request->id]);
    }

    public function GrantDocs($id)
    {
        $E      = Grants::find($id);
        $Form   = new FormEngine();
        $Grants = GrantDocs::where('GID', $E->GID)->get();

        $rem = ['created_at', 'DocURL', 'GID', 'GrantName', 'DOCID', 'updated_at', 'id'];

        $data = [
            'Title'  => 'Manage grant documentation',
            'Desc'   => 'Attach external PDF documents to the selected grant',
            'Page'   => 'grants.Docs',
            'E'      => $E,
            'Grants' => $Grants,
            'rem'    => $rem,
            'Form'   => $Form->Form('grant_docs'),
        ];

        return view('scrn', $data);
    }

    public function NewGrantDoc(Request $request)
    {
        $validated = $this->validate($request, [
            'DocumentTitle'    => 'required',
            'Description'      => 'required',
            'GID'              => 'required',
            'GrantName'        => 'required',
            'DocumentCategory' => 'required',
            'DOCID'            => 'required',
            'DocURL'           => 'required|mimes:pdf|max:10000',
        ]);

        GrantDocs::create($validated);

        $DocURL = $request->file('DocURL')->store('public');

        $Update = GrantDocs::where('DOCID', $request->DOCID)->first();

        $Update->DocURL = Str::replace('public', 'storage', $DocURL);

        $Update->save();

        return redirect()->back()->with('status', 'New external document attached to selected grant  successfully');
    }

    public function DelGrantDoc($id)
    {
        $a = GrantDocs::find($id);

        $DocURL = Str::replace('storage', 'app/public', $a->DocURL);

        unlink(storage_path($DocURL));

        $a->delete();

        return redirect()->back()->with('status', 'Selected external document  deleted  successfully');
    }

    public function ExtendGrantValidity(Request $request)
    {
        $validated = $this->validate($request, [
            'id'          => 'required',
            'GrantExpiry' => 'required',
        ]);

        $E = Grants::find($request->id);

        $E->GrantExpiry = $request->GrantExpiry;
        $E->status      = 'valid';

        $E->save();

        return redirect()->back()->with('status', 'Grant validity extended successfully');
    }

    public function GrantValidity()
    {
        $Grants = Grants::all();
        $Donors = Donors::all();

        $Form = new FormEngine();

        $Currencies = DB::table('currencies')->get();

        $rem = ['created_at', 'status', 'ValidityMonths', 'OriginalCurrency', 'Donor', 'AmountInUgx', 'updated_at', 'id', 'GID', 'DID', 'Country'];

        $data = [
            'Title'      => 'Grant database',
            'Desc'       => 'Manage grant records and settings',
            'Page'       => 'grants.Validity',
            'rem'        => $rem,
            'Currencies' => $Currencies,
            'Grants'     => $Grants,
            'Donors'     => $Donors,
            'Form'       => $Form->Form('grants'),
        ];

        return view('scrn', $data);
    }

    public function Projects()
    {
        $Grants   = Grants::all();
        $Projects = Projects::all();

        $Form = new FormEngine();

        $rem = ['created_at', 'status', 'ValidityMonths', 'PID', 'Grant', 'Donor', 'status', 'updated_at', 'id', 'GID', 'DID'];

        $data = [
            'Title'    => 'Project database',
            'Desc'     => 'Manage project records and settings',
            'Page'     => 'projects.Mgt',
            'rem'      => $rem,
            'Projects' => $Projects,
            'Grants'   => $Grants,
            'Form'     => $Form->Form('projects'),
        ];

        return view('scrn', $data);
    }

    public function NewProject(Request $request)
    {
        $validated = $this->validate($request, [
            'Grant'         => 'required',
            'ProjectName'   => 'required|unique:projects',
            'DetailedNotes' => 'required',
            'StartDate'     => 'required',
            'ProjectExpiry' => 'required',
            'Budget'        => 'required',
            'PID'           => 'required|unique:projects',
        ]);

        $G = Grants::where('GID', $request->Grant)->first();

        $Projects = new Projects();

        $Projects->ProjectName   = $request->ProjectName;
        $Projects->GID           = $request->Grant;
        $Projects->Grant         = $G->GrantName;
        $Projects->DID           = $G->DID;
        $Projects->PID           = $request->PID;
        $Projects->StartDate     = $request->StartDate;
        $Projects->ProjectExpiry = $request->ProjectExpiry;
        $Projects->Budget        = $request->Budget;
        $Projects->DetailedNotes = $request->DetailedNotes;

        $Projects->save();

        return redirect()->back()->with('status', 'Project record created  successfully');
    }

    public function DelProj($id)
    {
        Projects::find($id)->delete();

        return redirect()->back()->with('status', 'Project record deleted  successfully');
    }

    public function ExtendProjectValidity(Request $request)
    {
        $validated = $this->validate($request, [
            'id'            => 'required',
            'ProjectExpiry' => 'required',
        ]);

        $E = Projects::find($request->id);

        $E->ProjectExpiry = $request->ProjectExpiry;
        $E->status        = 'valid';

        $E->save();

        return redirect()->back()->with('status', 'Project validity extended successfully');
    }

    public function ProjectValidity()
    {
        $Grants   = Grants::all();
        $Projects = Projects::all();

        $Form = new FormEngine();

        $rem = ['created_at', 'status', 'ValidityMonths', 'PID', 'Grant', 'Donor', 'status', 'updated_at', 'id', 'GID', 'DID'];

        $data = [
            'Title'    => 'Project Validity',
            'Desc'     => 'track project validity',
            'Page'     => 'projects.Validity',
            'rem'      => $rem,
            'Projects' => $Projects,
            'Grants'   => $Grants,
            'Form'     => $Form->Form('projects'),
        ];

        return view('scrn', $data);
    }

    public function SelectProjAct()
    {
        $Grants = Grants::all();

        $data = [
            'Title'  => 'Select grant to attach activities to',
            'Desc'   => 'Activity  settings',
            'Page'   => 'activities.SelectGrants',
            'Grants' => $Grants,
        ];

        return view('scrn', $data);
    }

    public function ProjectSelected(Request $request)
    {
        return redirect()->route('ActivityDatabase', ['id' => $request->id]);
    }

    public function ActivityDatabase($id)
    {
        $Projects = Grants::find($id);

        $Form = new FormEngine();

        $rem = ['created_at', 'Year', 'Month', 'Grant', 'ValidityMonths', 'Project', 'ProgressStatus', 'status', 'AID', 'updated_at', 'id', 'DID', 'PID', 'GID'];

        $Activities = Activities::where('GID', $Projects->GID)->get();

        $data = [
            'Title'      => 'Grant activity database',
            'Desc'       => 'View all  activity  records attached to the selected grant',
            'Page'       => 'activities.Mgt',
            'P'          => $Projects,
            'Activities' => $Activities,
            'rem'        => $rem,
            'Form'       => $Form->Form('activities'),
        ];

        return view('scrn', $data);
    }

    public function NewActivity(Request $request)
    {
        $validated = $this->validate($request, [
            'AID'                 => 'required',
            'Activity'            => 'required|unique:activities',
            'Budget'              => 'required',

            'StartDate'           => 'required',
            'ActivityExpiry'      => 'required',
            'StrategicObjectives' => 'required',
            'CriticalInformation' => 'required',

            'DID'                 => 'required',
            'GID'                 => 'required',
        ]);

        $Activities = Activities::create($validated);

        return redirect()->back()
            ->with('status', 'New project activity record created successfully.');
    }

    public function DelActivity($id)
    {
        Activities::find($id)->delete();

        return redirect()->back()
            ->with('status', 'Selected project activity record deleted successfully.');
    }

    public function SelectProjActCost()
    {
        $Projects = Projects::all();

        $data = [
            'Title'    => 'Project activity costing | select project',
            'Desc'     => 'Activity costing project filter',
            'Page'     => 'activities.Select2',
            'Projects' => $Projects,
        ];

        return view('scrn', $data);
    }

    public function CostSelectedProject(Request $request)
    {
        $Projects   = Projects::find($request->id);
        $Activities = Activities::where('PID', $Projects->PID)->get();

        $data = [
            'Title'      => 'Select activity to attach costs to',
            'Desc'       => 'Activity costing  filter',
            'Page'       => 'activities.SelAct',
            'Activities' => $Activities,
        ];

        return view('scrn', $data);
    }

    public function GoToCosts(Request $request)
    {
        return redirect()->route('MgtCosts', ['id' => $request->id]);
    }

    public function MgtCosts($id)
    {
        $A = Activities::find($id);

        $ActivityCost = ActivityCost::where('AID', $A->AID)->get();

        $Form = new FormEngine();

        $rem = ['created_at', 'AID', 'updated_at', 'id', 'DID', 'PID', 'GID'];

        $data = [
            'Title'      => 'Attach costs to the selected activity | ' . $A->Activity,
            'Desc'       => 'Activity costing  interface',
            'Page'       => 'activities.Cost',
            'Activities' => $ActivityCost,
            'A'          => $A,
            'rem'        => $rem,
            'Form'       => $Form->Form('activity_costs'),
        ];

        return view('scrn', $data);
    }

    public function NewCost(Request $request)
    {
        $validated = $this->validate($request, [
            'PID'         => 'required',
            'DID'         => 'required',
            'GID'         => 'required',
            'AID'         => 'required',
            'Cost'        => 'required',
            'Description' => 'required',
            'Amount'      => 'required',
        ]);

        $ActivityCost = ActivityCost::create($validated);

        return redirect()->back()
            ->with('status', 'New  activity cost record created successfully.');
    }

    public function DelCost($id)
    {
        ActivityCost::find($id)->delete();

        return redirect()->back()
            ->with('status', 'New  activity cost  deleted successfully.');
    }

    public function SelectGrantBVA()
    {
        $Grants = Grants::all();

        $data = [
            'Title'  => 'Select grant to attach BVA report to',
            'Desc'   => 'Grant BVA report | Calculated from project budgets ',
            'Page'   => 'bva.Select',
            'Grants' => $Grants,
        ];

        return view('scrn', $data);
    }

    public function BvaSelected(Request $request)
    {
        return redirect()->route('BvaReport', ['id' => $request->id]);
    }

    public function BvaReport($id)
    {
        $Grants = Grants::all();

        $data = [
            'Title'  => 'Select grant to attach BVA report to',
            'Desc'   => 'Grant BVA report | Calculated from project budgets ',
            'Page'   => 'bva.Select',
            'Grants' => $Grants,
        ];

        return view('scrn', $data);
    }

    public function UpdateDonor(Request $request)
    {
        $validated = $this->validate($request, [
            'Name'          => 'required',
            'Phone'         => 'required',
            'Email'         => 'required',
            'Address'       => 'required',
            'ContactPerson' => 'required',
            'Country'       => 'required',
            'Category'      => 'required',
            'Description'   => 'required',
        ]);

        Donors::where('id', $request->id)->update($validated);

        return redirect()->back()
            ->with('status', 'The donor record has been updated successfully.');
    }

    public function MgtBroadCats()
    {
        $BroadCategories = BroadCategories::all();

        $Form = new FormEngine();

        $rem = ['created_at', 'CatID', 'updated_at', 'id'];

        $data = [
            'Title'           => 'Manage broad categories for activity costing',
            'Desc'            => 'Activity settings | broad categories',
            'Page'            => 'activities.BroadCat',
            'BroadCategories' => $BroadCategories,
            'Form'            => $Form->Form('broad_categories'),
            'rem'             => $rem,
        ];

        return view('scrn', $data);
    }

    public function NewBroadCat(Request $request)
    {
        $validated = $this->validate($request, [
            'BroadCategory'    => 'required|unique:broad_categories',
            'MeasurementUnits' => 'required',
            'CatID'            => 'required',
        ]);

        // dd($validated);
        BroadCategories::create($validated);

        return redirect()->back()
            ->with('status', 'New  activity broad category created successfully.');
    }

    public function DelBroadCat($id)
    {
        BroadCategories::find($id)->delete();

        return redirect()->back()
            ->with('status', 'Activity broad category deleted successfully.');
    }

    public function SelectGrantActCost()
    {
        $Grants = Grants::all();

        $data = [
            'Title'  => 'Grant activity costing | select grant',
            'Desc'   => 'Activity costing grant filter',
            'Page'   => 'activities.Select',
            'Grants' => $Grants,
        ];

        return view('scrn', $data);
    }

    public function CostGrantSelected(Request $request)
    {
        $validated = $this->validate($request, [
            'id' => 'required',
        ]);

        return redirect()
            ->route('ReturnActivityCosts', ['id' => $request->id]);
    }

    public function ReturnActivityCosts($id)
    {
        $Grants = Grants::find($id);

        $Activities = Activities::where('GID', $Grants->GID)->get();

        $data = [
            'Title'      => 'Select activity to attach costing to',
            'Desc'       => 'Activity costing | Activity selection',
            'Page'       => 'activities.SelAct',
            'Activities' => $Activities,
        ];

        return view('scrn', $data);
    }

    public function ActSelected(Request $request)
    {
        $validated = $this->validate($request, [
            'id' => 'required',
        ]);

        return redirect()
            ->route('ReturnActCosting', ['id' => $request->id]);
    }

    public function ReturnActCosting($id)
    {
        $BroadCategories = BroadCategories::all();

        $Act = Activities::find($id);

        $Form = new FormEngine();

        $rem = ['created_at', 'CostID', 'Subtotal', 'Units', 'BroadCategory', 'AID', 'GID', 'DID', 'updated_at', 'id'];

        $Activities = DB::table('activity_costs AS A')
            ->where('A.AID', $Act->AID)
        //->where('E.EmpID', $EmpID)
            ->join('grants AS G', 'G.GID', '=', 'A.GID')
            ->join('donors AS D', 'D.DID', '=', 'A.DID')

            ->select('A.*', 'G.*', 'A.id AS APID', 'D.*')
            ->get();

        //dd($Activities);

        $data = [
            'Title'      => 'Attach costs to the  activity ' . $Act->Activity,
            'Desc'       => 'Activity costing',
            'Page'       => 'activities.Cost',
            'Activities' => $Activities,
            'A'          => $Act,
            'Form'       => $Form->Form('activity_costs'),
            'rem'        => $rem,
            'Categories' => $BroadCategories,
        ];

        return view('scrn', $data);
    }

    public function NewCosting(Request $request)
    {
        $validated = $this->validate($request, [
            'AID'              => 'required',
            'GID'              => 'required',
            'DID'              => 'required',
            'CostID'           => 'required',
            'Frequency'        => 'required',
            'QuantityRequired' => 'required',
            'UnitCost'         => 'required',
        ]);

        ActivityCosts::create($validated);

        $b = BroadCategories::find($request->id);

        $subtotal = $request->Frequency * $request->UnitCost * $request->QuantityRequired;

        $up                = ActivityCosts::where('CostID', $request->CostID)->first();
        $up->Subtotal      = $subtotal;
        $up->Units         = $b->MeasurementUnits;
        $up->BroadCategory = $b->BroadCategory;
        $up->save();

        return redirect()->back()
            ->with('status', 'Activity cost  created successfully.');
    }

    public function DelCostAct($id)
    {
        ActivityCosts::find($id)->delete();

        return redirect()->back()
            ->with('status', 'Activity cost  created successfully.');
    }

    public function UpdateGrant(Request $request)
    {
        $validated = $this->validate($request, [
            'GrantName'                    => 'required',
            'GrantCategory'                => 'required',
            'OriginalAmount'               => 'required',
            'OriginalCurrency'             => 'required',
            'GrantStartDate'               => 'required',
            'GrantAmountAlreadySpentInUgx' => 'required',
            'OriginalExchangeRate'         => 'required',
            'GrantExpiry'                  => 'required',
            'GrantNumber'                  => 'required',
            'DetailedNotes'                => 'required',
            'Donor'                        => 'required',
            'id'                           => 'required',

        ]);

        $D = Donors::where('Name', $request->Donor)->first();

        $Grants = Grants::find($request->id);

        /**UgxAmount */
        $UgxAmount = $request->OriginalAmount * $request->OriginalExchangeRate;
        /**UgxAmount */

        /**Available */
        $Available                         = $UgxAmount - $request->GrantAmountAlreadySpentInUgx;
        $Grants->AvailableGrantAmountInUgx = $Available;
        /**Available */

        /***Amount Spent */
        $Grants->GrantAmountAlreadySpentInUgx = $request->GrantAmountAlreadySpentInUgx;
        /***Amount Spent */

        /**AmountInUgx */
        $Grants->AmountInUgx = $UgxAmount;
        /**AmountInUgx */

        $Grants->GrantName            = $request->GrantName;
        $Grants->GrantCategory        = $request->GrantCategory;
        $Grants->OriginalAmount       = $request->OriginalAmount;
        $Grants->GrantExpiry          = $request->GrantExpiry;
        $Grants->OriginalCurrency     = $request->OriginalCurrency;
        $Grants->GrantStartDate       = $request->GrantStartDate;
        $Grants->OriginalExchangeRate = $request->OriginalExchangeRate;
        $Grants->GrantNumber          = $request->GrantNumber;
        $Grants->DetailedNotes        = $request->DetailedNotes;
        $Grants->Donor                = $request->Donor;
        $Grants->DID                  = $D->DID;

        //$Grants->GrantAmountAlreadySpentInUgx = $D->GrantAmountAlreadySpentInUgx;
        $Grants->AvailableGrantAmountInUgx = $UgxAmount - $request->GrantAmountAlreadySpentInUgx;
        $Grants->save();

        return redirect()->back()
            ->with('status', 'Grant record   updated successfully.');
    }
}
