<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Models\Beneficiaries;
use App\Models\HR\Departments;
use App\Models\HR\Employees;
use App\Models\Kins;
use App\Models\Noticeboard;
use App\Models\Role;
use App\Models\StaffBenefits;
use App\Models\StaffDocs;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainHumanResource extends Controller
{

    public function AccountRouter(Type $var = null)
    {
        if (\Auth::user()->role == 'hrandfinance') {

            $EmpSoonExpire = DB::table('employees')
                ->where('RecordStatus', 'Contract Active')
                ->where('SoonExpiring', 'true')
                ->count();

            $ActiveEmp = DB::table('employees')
                ->where('RecordStatus', 'Contract Active')
                ->count();

            $ExpEmp = DB::table('employees')
                ->where('RecordStatus', '!=', 'Contract Active')
                ->count();

            $ActiveCon = DB::table('contractors')
                ->where('RecordStatus', 'Contract Active')
                ->count();

            $ExpCon = DB::table('contractors')
                ->where('RecordStatus', '!=', 'Contract Active')
                ->count();

            $ValidGrants = DB::table('grants')
                ->where('status', 'valid')
                ->count();

            $Donors = DB::table('donors')
                ->count();

            $HrandFinanceAccounts = DB::table('users')
                ->where('role', 'hrandfinance')
                ->count();

            $ConSoonExpire = DB::table('contractors')
                ->where('RecordStatus', 'Contract Active')
                ->where('SoonExpiring', 'true')
                ->count();

            $data = [
                'Title' => 'Human Resource and Finance Dashboard',
                'Desc' => 'Statistics Panel',
                'Page' => 'hr.HrStats',
                'EmpSoonExpire' => $EmpSoonExpire,
                'ConSoonExpire' => $ConSoonExpire,
                'ActiveEmp' => $ActiveEmp,
                'ExpEmp' => $ExpEmp,
                'ActiveCon' => $ActiveCon,
                'ExpCon' => $ExpCon,
                'ValidGrants' => $ValidGrants,
                'Donors' => $Donors,
                'HrandFinanceAccounts' => $HrandFinanceAccounts,

            ];

            return view('scrn', $data);

        } else {

            return redirect()->route('MgtEmp');
        }

    }

    public function UpdateAcc(Request $request)
    {
        $validated = $this->validate($request, [
            'id' => 'required',
            'password' => 'required|confirmed',
        ]);

        $User = User::find($request->id);

        $User->password = Hash::make($request->password);

        $User->save();

        return redirect()->back()->with('status', 'User account updated successfully');
    }

    public function DelUserAccount($id)
    {
        User::find($id)->delete();

        return back()->with('status', 'User account deleted successfully');
    }

    public function MgtUsers()
    {
        $Staff = Employees::where('RecordStatus', 'Contract Active')
            ->get();

        $User = User::all();

        $FormEngine = new FormEngine();

        $rem = ['EmpID', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'id'];

        $data = [
            'Title' => 'User Account Control',
            'Desc' => 'User account settings',
            'Page' => 'users.Mgt',
            'User' => $User,
            'Staff' => $Staff,
            'rem' => $rem,
            'Form' => $FormEngine->Form('users'),
        ];

        return view('scrn', $data);
    }

    public function NewRoles(Request $request)
    {
        $validated = $this->validate($request, [
            'id' => 'required',
            'role' => 'required',
            'Email' => 'required',
        ]);

        if (Str::of($request->Email)->contains(['.com'])) {
            $E = Employees::find($request->id);

            $User = new User();

            $User->name = $E->StaffName;
            $User->email = $request->Email;
            $User->password = Hash::make($E->Email);
            $User->role = $request->role;
            $User->EmpID = $E->EmpID;

            $User->save();

            $details = [
                'Title' => 'Hello ' . $E->StaffName . ', You AfriChild MIS account has been created successfully',
                'body' => 'Your password is ' . $request->Email . ' and your username is  ' . $request->Email . ' Please change you password after login.',
                'url' => config('app.url'),
            ];

            \Mail::to($request->Email)->send(new VerifyAccount($details));

            return back()->with('status', 'New user account created successfully');
        } else {

            return back()->with('error_a', 'Only AfriChild issued emails are allowed');

        }

    }

    private function CheckConEXpiry()
    {
        $Count = Employees::whereDate('ContractExpiry', '<', date('Y-m-d'))
            ->where('RecordStatus', 'Contract Active')
            ->count();

        if ($Count > 0) {
            $Employees = Employees::whereDate('ContractExpiry', '<', date('Y-m-d'))
                ->where('RecordStatus', 'Contract Active')
                ->get();

            foreach ($Employees as $data) {
                $E = Employees::find($data->id);

                $E->RecordStatus = 'Contract Expired';
                $E->save();
            }
        }
    }

    private function ConValidityLogic()
    {
        $this->CheckConEXpiry();

        $Count = Employees::where('RecordStatus', 'Contract Active')
            ->count();

        if ($Count > 0) {
            $Employees = Employees::where('RecordStatus', 'Contract Active')
                ->get();

            foreach ($Employees as $data) {
                $E = Employees::find($data->id);

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

    public function MgtDepts()
    {
        $FormEngine = new FormEngine();

        $rem = ['DeptID', 'created_at', 'updated_at', 'id'];

        $Departments = Departments::all();

        $data = [
            'Title' => 'Organization Department Settings',
            'Desc' => 'Manage all your departments',
            'Page' => 'Depts.MgtDepts',
            'Departments' => $Departments,
            'FormEngine' => $FormEngine,
            'rem' => $rem,
            'Form' => $FormEngine->Form('departments'),
        ];

        return view('scrn', $data);
    }

    public function DelDept($id)
    {
        Departments::find($id)->delete();

        return redirect()->back()->with('status', 'Department deleted successfully');
    }

    public function NewDept(Request $request)
    {
        $validated = $this->validate($request, [
            'DepartmentName' => 'required|unique:departments',
            'DeptID' => 'required|unique:departments',
            'Description' => 'required',
        ]);

        Departments::create($validated);

        return back()->with('status', 'New department created successfully');
    }

    public function MgtRoles()
    {
        $FormEngine = new FormEngine();

        $Departments = Departments::all();
        $Roles = Role::all();

        $rem = ['DeptID', 'created_at', 'updated_at', 'Department', 'id'];

        $data = [
            'Title' => 'Organization designation/role Settings',
            'Desc' => 'Manage all supported designations/roles',
            'Page' => 'Roles.MgtRoles',
            'Departments' => $Departments,
            'FormEngine' => $FormEngine,
            'rem' => $rem,
            'Roles' => $Roles,
            'Form' => $FormEngine->Form('roles'),
        ];

        return view('scrn', $data);
    }

    public function NewRole(Request $request)
    {
        $validated = $this->validate($request, [
            'Designation' => 'required|unique:roles',
            'Department' => 'required',
            'Description' => 'required',
        ]);

        Role::create($validated);

        $Role = Role::where('Designation', $request->Designation)
            ->first();

        $D = Departments::where('DepartmentName', $request->Department)
            ->first();

        $Role->DeptID = $D->DeptID;

        $Role->save();

        return back()->with('status', 'New role/designation created successfully');
    }

    public function MgtEmp(Type $var = null)
    {
        $Roles = Role::all();

        $Employees = Employees::where('RecordStatus', 'Contract Active')
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
            'HOD',
            'MonthsToExpiry',
            'EmpID',
            'StaffPhoto',
            'PromotionStatus',
            'created_at',
            'updated_at',
            'RecordStatus',
            'Designation',
            'id',
            'IDScan',
            'Gender',
            'SoonExpiring',
        ];

        $data = [
            'Title' => 'Staff records database | Only active contracts',
            'Desc' => ' Reffer to staff documentation for uploaded documents',
            'Page' => 'emp.MgtEmp',
            'Departments' => $Departments,
            'Employees' => $Employees,
            'rem' => $rem,
            'Roles' => $Roles,
            'Form' => $FormEngine->Form('employees'),
        ];

        return view('scrn', $data);
    }

    public function NewEmp(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validated = $this->validate($request, [
            'StaffName' => 'required|unique:employees',
            'PhoneNumber' => 'required|unique:employees',
            'Email' => 'required|unique:employees',
            'LocalAddress' => 'required',
            'PermanentAddress' => 'required',
            'NIN' => 'required|unique:employees',
            'Nationality' => 'required',
            'Designation' => 'required',
            'ReportsTo' => 'required',
            'DOB' => 'required|date|before:' . $before,
            'Department' => 'required',
            'JoiningDate' => 'required',
            'ContractExpiry' => 'required',
            'MonthlySalary' => 'required',
            'Gender' => 'required',
            'BankName' => 'required',
            'BankBranch' => 'required',
            'AccountName' => 'required|unique:employees',
            'AccountNumber' => 'required|unique:employees',
            'TIN' => 'required|unique:employees',
            'BankCode' => 'required',
            'StaffCode' => 'required',
            'EmpID' => 'required|unique:employees',
        ]);

        Employees::create($validated);

        return back()->with('status', 'New employee record created successfully');
    }

    public function ContractTerm($id)
    {
        $E = Employees::find($id);

        $E->RecordStatus = 'Contract Expired';

        $E->save();

        return back()->with('status', 'Staff contract terminated/ended successfully');
    }

    public function DelEmp($id)
    {
        Employees::find($id)->delete();

        return back()->with('status', 'Staff record deleted successfully');
    }

    public function TerminateContract($id)
    {
        $Employees = Employees::find($id);

        $Employees->RecordStatus = 'Contract Ended';

        $Employees->save();

        return redirect()->back()->with('status', 'The contract of the selected staff member has been terminated successfully');
    }

    public function ExpiredCons()
    {
        $this->ConValidityLogic();

        $Roles = Role::all();

        $Employees = Employees::where('RecordStatus', 'Contract Ended')
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
            'Title' => 'Expired staff contracts ',
            'Desc' => 'Manage all expired staff  contracts and associated records | Reffer to staff documentation for uploaded documents',
            'Page' => 'emp.ExpCon',
            'Departments' => $Departments,
            'Employees' => $Employees,
            'rem' => $rem,
            'Roles' => $Roles,
            'Form' => $FormEngine->Form('employees'),
        ];

        return view('scrn', $data);
    }

    public function ReverseCon($id)
    {
        $Employees = Employees::find($id);

        $Employees->RecordStatus = 'Contract Active';

        $Employees->save();

        return redirect()->back()->with('status', 'The contract of the selected staff member has been re-activate successfully');
    }

    public function SoonExpiring()
    {
        $this->ConValidityLogic();

        $Employees = Employees::where('RecordStatus', 'Contract Active')
            ->where('SoonExpiring', 'true')
            ->get();

        $data = [
            'Title' => 'Staff contracts expiring 3 months or less from now',
            'Desc' => 'Contract status tracking',
            'Page' => 'emp.SoonExp',

            'Employees' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function SelectStaffDocs()
    {
        $Employees = Employees::where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title' => 'Select staff member to attach documentation to',
            'Desc' => 'staff documentation settings',
            'Page' => 'docs.SelectStaff',
            'Staff' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function DocsSelected(Request $request)
    {
        return redirect()->route('ReturnDocs', ['id' => $request->id]);
    }

    public function ReturnDocs($id)
    {
        $E = Employees::find($id);

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
            'Title' => $E->StaffName . ' | Staff documentation settings',
            'Desc' => 'Manage all documents attached to the selected staff member',
            'Page' => 'docs.StaffDocs',
            'Staff' => $StaffDocs,
            'E' => $E,
            'rem' => $rem,
            'Form' => $FormEngine->Form('staff_docs'),
        ];

        return view('scrn', $data);
    }

    public function NewDoc(Request $request)
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

        return redirect()->back()->with('status', 'New external document attached to selected staff member  successfully');
    }

    public function DelDoc($id)
    {
        $a = StaffDocs::find($id);

        $DocURL = Str::replace('storage', 'app/public', $a->DocURL);

        unlink(storage_path($DocURL));

        $a->delete();

        return redirect()->back()->with('status', 'Selected external document  deleted  successfully');
    }

    public function ConTrack()
    {
        $this->ConValidityLogic();

        $Employees = Employees::where('RecordStatus', 'Contract Active')->get();
        $data = [
            'Title' => 'Track the validity time frame of active staff contracts',
            'Desc' => 'Staff contract validity tracking interface',
            'Page' => 'emp.ConValidity',
            'Employees' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function Noticeboard()
    {
        $Noticeboard = Noticeboard::orderByDesc('created_at')
            ->get();

        $Form = new FormEngine();

        $rem = ['EmpID', 'HasAttachement', 'Status', 'SenderName', 'created_at', 'updated_at', 'id'];

        $data = [
            'Title' => 'Staff noticeboard',
            'Desc' => 'View all messages sent out to all staff members',
            'Page' => 'noticeboard.Notice',
            'Nots' => $Noticeboard,
            'rem' => $rem,
            'Form' => $Form->Form('noticeboards'),
        ];

        return view('scrn', $data);
    }

    public function NewNotice(Request $request)
    {
        $validated = $this->validate($request, [
            'HasAttachement' => 'required',
            'SenderName' => 'required',
            'Description' => 'required',
            'Subject' => 'required',
        ]);

        Noticeboard::create($validated);

        return redirect()->back()->with('status', 'Notice sent to all staff members successfully');
    }

    public function SelectStaffNOK()
    {
        $Employees = Employees::where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title' => 'Select staff member to attach next of kins to',
            'Desc' => 'Next of kin settings | Only active contracts are shown',
            'Page' => 'kins.SelectStaff',
            'Staff' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function StaffSelectedNOK(Request $request)
    {
        return redirect()->route('MgtNoks', ['id' => $request->id]);
    }

    public function MgtNoks($id)
    {
        $FormEngine = new FormEngine();

        $rem = ['EmpID', 'StaffName', 'EmpID', 'created_at', 'updated_at', 'id'];

        $E = Employees::find($id);

        $Kins = Kins::where('EmpID', $E->EmpID)->get();

        //dd($Kins);

        $data = [
            'Title' => 'Manage next of kins attached to the selected staff member',
            'Desc' => 'The selected staff member is ' . $E->StaffName,
            'Page' => 'kins.Kins',
            'E' => $E,
            'Kins' => $Kins,
            'Form' => $FormEngine->Form('kins'),
            'rem' => $rem,
        ];

        return view('scrn', $data);
    }

    public function DelNOK($id)
    {
        Kins::find($id)->delete();

        return redirect()->back()->with('status', 'Next of kin record deleted successfully');
    }

    public function NewKin(Request $request)
    {
        $validated = $this->validate($request, [
            'StaffName' => 'required',
            'Name' => 'required',
            'EmpID' => 'required',
            'IdNumber' => 'required|unique:kins',
            'Relationship' => 'required',
            'PhoneNumber' => 'required|unique:kins',
            'CurrentAddress' => 'required',
            'PermanentAddress' => 'required',
            'DateOfBirth' => 'required',
            'IdType' => 'required',
            'Gender' => 'required',
            'Email' => 'required|unique:kins',
        ]);

        Kins::create($validated);

        return back()->with('status', 'New next of kin record created successfully');
    }

    public function MgtBenefits()
    {
        $StaffBenefits = StaffBenefits::all();

        $FormEngine = new FormEngine();

        $rem = ['BID', 'created_at', 'updated_at', 'id'];

        $data = [
            'Title' => 'Manage supported non-salary benefit categories',
            'Desc' => 'Non-salary benefit categories',
            'Page' => 'bens.BenCategories',
            'Bens' => $StaffBenefits,
            'Form' => $FormEngine->Form('staff_benefits'),
            'rem' => $rem,
        ];

        return view('scrn', $data);
    }

    public function NewBenCat(Request $request)
    {
        $validated = $this->validate($request, [
            'Benefit' => 'required|unique:staff_benefits',
            'Description' => 'required',
            'Amount' => 'required',
            'BID' => 'required|unique:staff_benefits',
        ]);

        StaffBenefits::create($validated);

        return back()->with('status', 'New benefit category created successfully');
    }

    public function SelectBenStaff()
    {
        $Employees = Employees::where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title' => 'Select staff member to attach beneficiaries to',
            'Desc' => 'staff beneficiary settings',
            'Page' => 'bens.Select',
            'Staff' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function BenStaffSelected(Request $request)
    {
        return redirect()->route('MgtStaffBens', ['id' => $request->id]);
    }

    public function MgtStaffBens($id)
    {
        $E = Employees::find($id);

        $Beneficiaries = Beneficiaries::where('EmpID', $E->EmpID)->get();
        $StaffBenefits = StaffBenefits::all();

        $FormEngine = new FormEngine();

        $rem = ['BID', 'Benefit', 'BenID', 'StaffName', 'EmpID', 'created_at', 'updated_at', 'id'];

        $data = [
            'Title' => 'Select staff member to attach beneficiaries to',
            'Desc' => 'staff beneficiary settings',
            'Page' => 'bens.MgtBens',
            'Form' => $FormEngine->form('beneficiaries'),
            'rem' => $rem,
            'E' => $E,
            'Beneficiaries' => $Beneficiaries,
            'Benefits' => $StaffBenefits,
        ];

        return view('scrn', $data);
    }

    public function NewBeneficiary(Request $request)
    {
        $validated = $this->validate($request, [
            'Description' => 'required',
            'BID' => 'required',
            'StaffName' => 'required',
            'BenID' => 'required|unique:beneficiaries',
            'EmpID' => 'required',
            'Name' => 'required',
            'DateOfBirth' => 'required',
            'Gender' => 'required',
            'IdType' => 'required',
            'IdNumber' => 'required|unique:beneficiaries',
            'Gender' => 'required',
            'Relationship' => 'required',
            'PhoneNumber' => 'required|unique:beneficiaries',
            'CurrentAddress' => 'required',
            'PermanentAddress' => 'required',
            'Email' => 'required|unique:beneficiaries',
        ]);

        Beneficiaries::create($validated);

        $Update = Beneficiaries::where('BenID', $request->BenID)->first();

        $StaffBenefits = StaffBenefits::where('BID', $request->BID)->first();

        $Update->Benefit = $StaffBenefits->Benefit;

        $Update->save();

        return back()->with('status', 'New beneficiary attached to the selected staff member  successfully');
    }

    public function DelRole($id)
    {
        Role::find($id)->delete();

        return back()->with('status', 'Role deleted successfully');
    }

    public function UpdateEmp(Request $request)
    {
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validated = $this->validate($request, [
            'StaffName' => 'required',
            'PhoneNumber' => 'required',
            'id' => 'required',
            'Email' => 'required',
            'LocalAddress' => 'required',
            'PermanentAddress' => 'required',
            'NIN' => 'required',
            'Nationality' => 'required',
            'Designation' => 'required',
            'ReportsTo' => 'required',
            'DOB' => 'required|date|before:' . $before,
            'Department' => 'required',
            'JoiningDate' => 'required',
            'ContractExpiry' => 'required',
            'MonthlySalary' => 'required',
            'Gender' => 'required',
            'BankName' => 'required',
            'BankBranch' => 'required',
            'AccountName' => 'required',
            'AccountNumber' => 'required',
            'TIN' => 'required',
            'BankCode' => 'required',
            'StaffCode' => 'required',
        ]);

        Employees::where('id', $request->id)->update($validated);

        return back()->with('status', 'Employee record updated successfully');
    }

    public function ExtendCon(Request $request)
    {
        $validated = $this->validate($request, [
            'ContractExpiry' => 'required',
            'id' => 'required',
        ]);

        Employees::where('id', $request->id)->update($validated);
        $a = Employees::find($request->id);

        $a->RecordStatus = 'Contract Active';
        $a->SoonExpiring = 'false';
        $a->save();

        return back()->with('status', 'Staff member contract expiry extended successfully');
    }
}
