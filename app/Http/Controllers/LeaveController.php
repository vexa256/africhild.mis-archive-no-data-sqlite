<?php

namespace App\Http\Controllers;

use App\Charts\ChartEngine;
use App\Http\Controllers\Controller;
use App\Models\AssignLeaves;
use App\Models\HR\Employees;
use App\Models\Leaves;
use App\Models\LeaveTypes;
use Auth;
use DB;
use Illuminate\Http\Request;

class LeaveController extends Controller
{

    public function __construct()
    {

        $Count = Leaves::whereDate('EndDate', '<', date('Y-m-d'))
            ->where('ValidityStatus', 'valid')
            ->count();

        if ($Count > 0) {

            $check = Leaves::whereDate('EndDate', '<', date('Y-m-d'))
                ->where('ValidityStatus', 'valid')
                ->get();

            foreach ($check as $data) {

                $Leaves = Leaves::find($data->id);

                $Leaves->ValidityStatus = "expired";

                $Leaves->save();

            }

        }
    }

    public function LeaveSettings()
    {

        $Leave = LeaveTypes::all();
        $data = [

            "Title" => "Manage all staff leave categories",
            "Desc" => "Leave settings management interface",
            "Page" => "leave.settings",
            "Leave" => $Leave,
        ];
        return view("scrn", $data);

    }

    public function NewLeave(Request $request)
    {

        $validated = $this->validate($request, [

            "Description" => "required",
            "LID" => "required|unique:leave_types",
            "LeaveType" => "required|unique:leave_types",
            "Days" => "required",
        ]);

        LeaveTypes::create($validated);

        return back()->with('status', 'New leave category created successfully');
    }

    public function DeleteLeaveCat($id)
    {

        LeaveTypes::find($id)->delete();

        return back()->with('status', 'Leave category created successfully');
    }

    public function AssignLeave()
    {

        $Employees = Employees::where("RecordStatus", "Contract Active")->get();

        $data = [

            "Title" => "Select staff member to assign leave rights",
            "Desc" => "Leave assignment interface",
            "Page" => "leave.SelectStaff",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);

    }

    public function LeaveSelected(Request $request)
    {

        return redirect()->route('LeaveAssignment', ['id' => $request->id]);
    }

    public function LeaveAssignment($id)
    {

        $E = Employees::find($id);

        $Employees = DB::table('employees AS E')
            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $LeaveTypes = LeaveTypes::all();

        $data = [

            "Title" => "Manage staff leave assignment ",
            "Desc" => "The selected staff member is " . $E->StaffName,
            "Page" => "leave.Assign",
            "Employees" => $Employees,
            "StaffName" => $E->StaffName,
            "EmpID" => $E->EmpID,
            "LeaveTypes" => $LeaveTypes,
        ];
        return view("scrn", $data);
    }

    public function AcceptAssign(Request $request)
    {

        $validated = $this->validate($request, [

            "LID" => "required",
            "EmpID" => "required",

        ]);

        $E = Employees::where("EmpID", $request->EmpID)->first();
        $L = LeaveTypes::where("LID", $request->LID)->first();

        $AssignLeave = new AssignLeaves;
        $AssignLeave->EmpID = $E->EmpID;
        $AssignLeave->LID = $L->LID;
        $AssignLeave->Dayentitled = $L->Days;

        $AssignLeave->save();

        return back()->with('status', 'Leave rights assignment executed successfully');

    }

    public function RevokeLeaveRight($id)
    {
        AssignLeaves::find($id)->delete();

        return back()->with('status', 'Selected staff member leave rights revoked  successfully');
    }

    public function SelectLeaveApply()
    {

        $Employees = Employees::where("RecordStatus", "Contract Active")->
            where('EmpID', \Auth::user()->EmpID)->get();

        $data = [

            "Title" => "Select staff member to attach the leave application to ",
            "Desc" => "Leave application",
            "Page" => "leave.SelectStaff2",
            "Employees" => $Employees,
        ];
        return view("scrn", $data);

    }

    public function LeaveIdSelected(Request $request)
    {

        return redirect()->route('ApplyForLeave', ['id' => $request->id]);
    }

    public function ApplyForLeave($id)
    {

        $Sup = Employees::where('EmpID', '!=', Auth::user()->EmpID)->get();

        $E = Employees::find($id);

        $Apps = Leaves::where('EmpID', $E->EmpID)->get();

        $LeaveTypes = DB::table('employees AS E')
            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $data = [

            "Title" => "Leave application interface",
            "Desc" => "Leave applications attached to",
            "Page" => "leave.Apply",
            "LeaveTypes" => $LeaveTypes,
            "Sup" => $Sup,
            "Apps" => $Apps,
            "chart" => $this->LeaveChart($id),
            "StaffName" => $E->StaffName,
            "EmpID" => $E->EmpID,

        ];
        return view("scrn", $data);
    }

    private function LeaveChart($id)
    {

        $chart = new ChartEngine;

        $Leavetypes = DB::table('employees AS E')

            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->pluck('L.LeaveType');

        $LeaveDays = DB::table('employees AS E')

            ->where('E.id', $id)

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->pluck('A.Dayentitled');

        $chart->labels($Leavetypes);
        $chart->height(200);
        $chart->dataset('Unused Days', 'bar', $LeaveDays)
            ->color('#181c32')
            ->backgroundColor('#f1416c');

        return $chart;

    }

    public function NewApp(Request $request)
    {

        $validated = $this->validate($request, [
            'TheDateToday' => 'required|date',
            'StartDate' => 'required|date|after_or_equal:TheDateToday',
            'EndDate' => 'required|date|after_or_equal:StartDate',
            'EndDate' => 'required|date|after:TheDateToday',
            "LID" => "required",
            "AppLetter" => "required",
            "EmpID" => "required",
            "Supervisor" => "required",
            "DaysAppliedFor" => "required",
        ]);

        $AssignLeaves = AssignLeaves::where('LID', $request->LID)->first();
        $LeaveTypes = LeaveTypes::where('LID', $request->LID)->first();

        $Counter = Leaves::where('EmpID', $request->EmpID)
            ->where('ApprovalStatus', 'pending')
            ->orWhere('ValidityStatus', 'valid')
            ->count();

        if ($Counter > 0) {

            return back()->with('error_a', 'You have an already running  or approved leave request. Wait for action to end and then apply leave ');

        }

        if ($AssignLeaves->Dayentitled < $request->DaysAppliedFor) {

            return back()->with('error_a', 'You have applied for more days than  available for this particular leave category, Choose another leave category');

        }

        $Supervisor = Employees::find($request->Supervisor);

        $Leaves = new Leaves;

        $Leaves->LID = $request->LID;
        $Leaves->AppLetter = $request->AppLetter;
        $Leaves->StaffName = Auth::user()->name;
        $Leaves->EndDate = $request->EndDate;
        $Leaves->StartDate = $request->StartDate;
        $Leaves->LeaveCategory = $LeaveTypes->LeaveType;
        $Leaves->EmpID = $request->EmpID;
        $Leaves->ApproverEmpID = $Supervisor->EmpID;
        $Leaves->AssignedDays = $LeaveTypes->Days;
        $Leaves->DaysAppliedFor = $request->DaysAppliedFor;
        $Leaves->Approver = $Supervisor->StaffName;
        $Leaves->ApprovalStatus = 'pending';
        $Leaves->ValidityStatus = 'pending';
        $Leaves->status = 'pending';

        $Leaves->save();

        return redirect()->back()->with('status', 'Your leave application has been sent to your supervisor successfully, You will be notified when feedback is detected');

    }

    public function TerminateLeave($id)
    {
        $delete = Leaves::where('id', $id)
            ->where('ApprovalStatus', 'pending')
            ->where('ValidityStatus', 'pending')
            ->count();

        if ($delete > 0) {
            Leaves::where('id', $id)
                ->where('ApprovalStatus', 'pending')
                ->where('ValidityStatus', 'pending')
                ->delete();

            return redirect()->back()->with('status', 'Leave application deleted successfully');

        } else {

            return redirect()->back()->with('error_a', 'This leave application can not be deleted.  Supervisor action already taken. Contact your supervisor for more details');

        }
    }

    public function LeaveApproval()
    {
        $Sup = Employees::all();

        $PendingApps = Leaves::where('ApproverEmpID', Auth::user()->EmpID)
            ->where('ApprovalStatus', 'pending')
            ->where('ValidityStatus', 'pending')
            ->get();

        $ApprovedApps = Leaves::where('ApproverEmpID', Auth::user()->EmpID)
            ->where('ApprovalStatus', 'approved')
            ->get();

        $DeclinedApps = Leaves::where('ApproverEmpID', Auth::user()->EmpID)
            ->where('ApprovalStatus', 'declined')
            ->get();

        $LeaveTypes = DB::table('employees AS E')

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $data = [

            "Title" => "Leave request approval interface",
            "Desc" => "Approve or decline leave requests of staff members you supervise",
            "Page" => "leave.Approval",
            "LeaveTypes" => $LeaveTypes,
            "Sup" => $Sup,
            "Apps" => $PendingApps,
            "ApprovedApps" => $ApprovedApps,
            "DeclinedApps" => $DeclinedApps,

        ];
        return view("scrn", $data);
    }

    public function ApproveLeave(Request $request)
    {

        $validated = $this->validate($request, [

            'ApproverMessage' => 'required',
            'id' => 'required',

        ]);

        $L = Leaves::find($request->id);

        $AssignLeaves = AssignLeaves::where('LID', $L->LID)->first();

        $DaysEntitled = $AssignLeaves->Dayentitled - $L->DaysAppliedFor;

        $SpentDays = $L->SpentDays + $L->DaysAppliedFor;

        $UnusedDays = $DaysEntitled;

        $AssignLeaves->Dayentitled = $DaysEntitled;

        $L->SpentDays = $SpentDays;

        $L->UnusedDays = $UnusedDays;

        $L->ApprovalStatus = 'approved';

        $L->ValidityStatus = 'valid';

        $L->ApproverMessage = $request->ApproverMessage;

        $L->save();

        $AssignLeaves->save();

        return redirect()->back()->with('status', 'Leave application approved successfully');

    }

    public function DeclineLeave(Request $request)
    {

        $validated = $this->validate($request, [

            'ApproverMessage' => 'required',
            'id' => 'required',

        ]);

        $L = Leaves::find($request->id);

        $AssignLeaves = AssignLeaves::where('LID', $L->LID)->first();

        $L->ApprovalStatus = 'declined';

        $L->ValidityStatus = 'expired';

        $L->SpentDays = 'declined';

        $L->UnusedDays = 'declined';

        $L->ApproverMessage = $request->ApproverMessage;

        $L->save();

        return redirect()->back()->with('status', 'Leave request declined successfully');

    }

    public function HRDash()
    {
        $Sup = Employees::all();

        $PendingApps = Leaves::where('ApprovalStatus', 'pending')
            ->where('ValidityStatus', 'pending')
            ->get();

        $ApprovedApps = Leaves::where('ApprovalStatus', 'approved')
            ->get();

        $DeclinedApps = Leaves::where('ApprovalStatus', 'declined')
            ->get();

        $LeaveTypes = DB::table('employees AS E')

            ->join('assign_leaves AS A', 'A.EmpID', '=', 'E.EmpID')

            ->join('leave_types AS L', 'L.LID', '=', 'A.LID')

            ->select('A.*', 'E.*', 'L.*', 'A.id AS AID')

            ->get();

        $data = [

            "Title" => "Human Resource Leave Dashboard",
            "Desc" => "View all staff leave records",
            "Page" => "leave.HR",
            "LeaveTypes" => $LeaveTypes,
            "Sup" => $Sup,
            "Apps" => $PendingApps,
            "ApprovedApps" => $ApprovedApps,
            "DeclinedApps" => $DeclinedApps,

        ];
        return view("scrn", $data);
    }

}