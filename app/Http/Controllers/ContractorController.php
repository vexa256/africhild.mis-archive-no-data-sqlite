<?php

namespace App\Http\Controllers;

use App\Models\Contractors;
use App\Models\HR\Departments;
use App\Models\Role;
use App\Models\StaffDocs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContractorController extends Controller
{
    public function MgtCons()
    {
        $Roles = Role::all();

        $Employees = Contractors::where('RecordStatus', 'Contract Active')
            ->get();

        $Countries = \DB::table('countries')->select('langEN AS name')->get();

        $Departments = Departments::all();

        $FormEngine = new FormEngine();

        $rem = [
            'IDScan',
            'Department',
            'RoleID',
            'ReportsToRoleID',
            'ReportsTo',
            'Gender',
            'EmpID',
            'HOD',
            'MonthsToExpiry',
            'StaffPhoto',
            'PromotionStatus',
            'created_at',
            'updated_at',
            'RecordStatus',
            'id',
            'IDScan',
            'Gender',
            'SoonExpiring',
            'Nationality',
        ];

        $data = [
            'Title' => 'Contractor records database | Only active contracts',
            'Desc' => 'Reffer to contractor documentation for uploaded documents',
            'Page' => 'cons.MgtCons',
            'Departments' => $Departments,
            'Employees' => $Employees,
            'rem' => $rem,
            'Roles' => $Roles,
            'Countries' => $Countries,
            'Form' => $FormEngine->Form('contractors'),
        ];

        return view('scrn', $data);
    }

    public function NewCon(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validated = $this->validate($request, [
            'Contractor' => 'required|unique:contractors',
            'ContactPerson' => 'required',
            'PhoneNumber' => 'required|unique:contractors',
            'Email' => 'required|unique:contractors',
            'PermanentAddress' => 'required',
            'Nationality' => 'required',
            'IdOrRegNumber' => 'required',
            'Expertise' => 'required',
            'ServiceRendered' => 'required',
            'ReportsTo' => 'required',
            'Department' => 'required',
            'JoiningDate' => 'required',
            'ContractExpiry' => 'required',
            'ProfessionalFees' => 'required',
            'Category' => 'required',
            'Description' => 'required',
            'BankName' => 'required',
            'BankBranch' => 'required',
            'AccountName' => 'required|unique:contractors',
            'AccountNumber' => 'required|unique:contractors',
            'TIN' => 'required|unique:contractors',
            'EmpID' => 'required|unique:contractors',
        ]);

        Contractors::create($validated);

        return back()->with('status', 'New contractor record created successfully');
    }

    public function ConContractTerm($id)
    {
        $E = Contractors::find($id);

        $E->RecordStatus = 'Contract Expired';

        $E->save();

        return back()->with('status', 'Contractor contract terminated/ended successfully');
    }

    public function DelCon($id)
    {
        Contractors::find($id)->delete();

        return back()->with('status', 'Contractor record deleted successfully');
    }

    public function SelectConDocs()
    {
        $Employees = Contractors::where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title' => 'Select contractor to attach documentation to',
            'Desc' => 'contractor documentation settings',
            'Page' => 'cons.Select',
            'Staff' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function ConDocsSelected(Request $request)
    {
        return redirect()->route('ConReturnDocs', ['id' => $request->id]);
    }

    public function ConReturnDocs($id)
    {
        $E = Contractors::find($id);

        $FormEngine = new FormEngine();

        $rem = [
            'StaffName',

            'Designation',

            'Department',

            'DocURL',

            'DOCID',

            'EmpID',

            'created_at',

            'updated_at',

            'id',
        ];

        $StaffDocs = StaffDocs::where('EmpID', $E->EmpID)->get();

        $data = [
            'Title' => $E->Contractor.' | Contractor documentation settings',
            'Desc' => 'Manage all documents attached to the selected contractor',
            'Page' => 'cons.ConDocs',
            'Staff' => $StaffDocs,
            'E' => $E,
            'rem' => $rem,
            'Form' => $FormEngine->Form('staff_docs'),
        ];

        return view('scrn', $data);
    }

    public function NewConDoc(Request $request)
    {
        $validated = $this->validate($request, [
            'DocumentTitle' => 'required',
            'Description' => 'required',
            'EmpID' => 'required',
            'StaffName' => 'required',
            'Designation' => 'required',
            'Department' => 'required',
            'DocumentCategory' => 'required',
            'DOCID' => 'required',
            'DocURL' => 'required|mimes:pdf|max:10000',
        ]);

        StaffDocs::create($validated);

        $DocURL = $request->file('DocURL')->store('public');

        $Update = StaffDocs::where('DOCID', $request->DOCID)->first();

        $Update->DocURL = Str::replace('public', 'storage', $DocURL);

        $Update->save();

        return redirect()->back()->with('status', 'New external document attached to selected contractor  successfully');
    }

    private function CheckConEXpiry()
    {
        $Count = Contractors::whereDate('ContractExpiry', '<', date('Y-m-d'))
            ->where('RecordStatus', 'Contract Active')
            ->count();

        if ($Count > 0) {
            $Employees = Contractors::whereDate('ContractExpiry', '<', date('Y-m-d'))
                ->where('RecordStatus', 'Contract Active')
                ->get();

            foreach ($Employees as $data) {
                $E = Contractors::find($data->id);

                $E->RecordStatus = 'Contract Expired';
                $E->save();
            }
        }
    }

    private function ConValidityLogic()
    {
        $this->CheckConEXpiry();

        $Count = Contractors::where('RecordStatus', 'Contract Active')
            ->count();

        if ($Count > 0) {
            $Employees = Contractors::where('RecordStatus', 'Contract Active')
                ->get();

            foreach ($Employees as $data) {
                $E = Contractors::find($data->id);

                $ConExpiry = Carbon::createFromFormat('Y-m-d', $E->ContractExpiry);
                $DateNow = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));

                $diff_in_months = $ConExpiry->diffInMonths($DateNow);

                if ($diff_in_months <= 3) {
                    $E->SoonExpiring = 'true';
                    $E->MonthsToExpiry = $diff_in_months;
                    $E->save();
                } else {
                    $E->MonthsToExpiry = $diff_in_months;
                    $E->save();
                }
            }
        }
    }

    public function ContractorConTrack()
    {
        $this->ConValidityLogic();

        $Employees = Contractors::where('RecordStatus', 'Contract Active')->get();
        $data = [
            'Title' => 'Track the validity time frame of  contractor contracts',
            'Desc' => 'Contract validity tracking interface',
            'Page' => 'cons.ConValidity',
            'Employees' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function ConSoonExpiring()
    {
        $this->ConValidityLogic();

        $Employees = Contractors::where('RecordStatus', 'Contract Active')
            ->where('SoonExpiring', 'true')
            ->get();

        $data = [
            'Title' => 'Contractor contracts expiring 3 months or less from now',
            'Desc' => 'Contract status tracking | Contractors',
            'Page' => 'cons.SoonExpCons',

            'Employees' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function ConExpiredCons()
    {
        $this->ConValidityLogic();

        $Roles = Role::all();

        $Employees = Contractors::where('RecordStatus', 'Contract Ended')
            ->get();

        $Departments = Departments::all();

        $FormEngine = new FormEngine();

        $rem = [
            'IDScan',
            'Department',
            'RoleID',
            'ReportsToRoleID',
            'ReportsTo',
            'Gender',
            'EmpID',
            'StaffPhoto',
            'PromotionStatus',
            'created_at',
            'updated_at',
            'RecordStatus',
            'id',
            'IDScan',
            'Gender',
        ];

        $data = [
            'Title' => 'Expired contractor contracts ',
            'Desc' => 'View all expired contractor  contracts ',
            'Page' => 'cons.ExpCons',
            'Departments' => $Departments,
            'Employees' => $Employees,
            'rem' => $rem,
            'Roles' => $Roles,
            'Form' => $FormEngine->Form('employees'),
        ];

        return view('scrn', $data);
    }
}
