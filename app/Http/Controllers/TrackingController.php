<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FormEngine;
use Auth;
use DB;
use Illuminate\Http\Request;

class TrackingController extends Controller
{

    public function __construct()
    {
        $counter = DB::table('trackings')
            ->whereDate('EndDate', '<', date('Y-m-d'))
            ->count();

        if ($counter > 0) {

            $up = DB::table('trackings')
                ->whereDate('EndDate', '<', date('Y-m-d'))
                ->get();

            foreach ($up as $data) {
                DB::table('trackings')
                    ->where('id', $data->id)
                    ->update([

                        'Status' => 'Expired',

                    ]);

            }

        }
    }

    public function CreateMyCategories()
    {

        $FormEngine = new FormEngine();
        $rem = ['EmpID', 'CatID', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'id'];

        $Cat = DB::table('tracking_categories')->where('EmpID', Auth::user()->EmpID)
            ->get();

        $data = [
            'Title' => 'Create your activity categories',
            'Desc' => 'Categories to group your activities',
            'Page' => 'Track.MgtCat',
            'rem' => $rem,
            'Cat' => $Cat,
            'Form' => $FormEngine->Form('tracking_categories'),
        ];

        return view('scrn', $data);
    }

    public function CreateMyActivities()
    {
        $FormEngine = new FormEngine();
        $rem = ['EmpID', 'CatID', 'email_verified_at', 'password', 'remember_token', 'created_at', 'Year', 'Status', 'Month', 'Supervisor', 'updated_at', 'ActivityID', 'ActID', 'EmpID', 'id', 'SupervisorComment'];

        $Cat = DB::table('tracking_categories')->where('EmpID', Auth::user()->EmpID)
            ->orderBy('created_at', 'Desc')->get();

        $MyActs = DB::table('trackings')->where('EmpID', Auth::user()->EmpID)
            ->orderBy('created_at', 'Desc')->get();

        $Emp = DB::table('employees')->get();

        $Act = DB::table('trackings AS T')
            ->where('T.EmpID', Auth::user()->EmpID)
            ->join('tracking_categories AS C', 'C.CatID', '=', 'T.CatID')
            ->join('employees AS E', 'E.EmpID', '=', 'T.Supervisor')
            ->orderBy('T.created_at', 'Desc')
            ->select('C.Category', 'C.Description AS Desc', 'T.*', 'E.StaffName')
            ->get();

        $data = [
            'Title' => 'Manage and Track your activity  progress',
            'Desc' => 'Lets plan  your activities',
            'Page' => 'Track.MyAct',
            'rem' => $rem,
            'Cat' => $Cat,
            'Act' => $Act,
            'Emp' => $Emp,
            'MyActs' => $MyActs,
            'Form' => $FormEngine->Form('trackings'),
        ];

        return view('scrn', $data);
    }

    public function SuperVisorAction(Type $var = null)
    {

        $FormEngine = new FormEngine();
        $rem = ['EmpID', 'CatID', 'email_verified_at', 'password', 'remember_token', 'created_at', 'Year', 'Status', 'Month', 'Supervisor', 'updated_at', 'ActivityID', 'ActID', 'EmpID', 'id', 'SupervisorComment'];

        $Cat = DB::table('tracking_categories')->where('EmpID', Auth::user()->EmpID)
            ->orderBy('created_at', 'Desc')->get();

        $MyActs = DB::table('trackings')->where('Supervisor', Auth::user()->EmpID)
            ->orderBy('created_at', 'Desc')->get();

        $Emp = DB::table('employees')->get();

        $Act = DB::table('trackings AS T')
            ->where('T.Supervisor', Auth::user()->EmpID)
            ->join('tracking_categories AS C', 'C.CatID', '=', 'T.CatID')
            ->join('employees AS E', 'E.EmpID', '=', 'T.Supervisor')
            ->orderBy('T.created_at', 'Desc')
            ->select('C.Category', 'C.Description AS Desc', 'T.*', 'E.StaffName')
            ->get();

        $data = [
            'Title' => 'Review and comment on staff activities you supervise',
            'Desc' => 'Supervise staff activities',
            'Page' => 'Track.Supervisor',
            'rem' => $rem,
            'Cat' => $Cat,
            'Act' => $Act,
            'Emp' => $Emp,
            'MyActs' => $MyActs,
            'Form' => $FormEngine->Form('trackings'),
        ];

        return view('scrn', $data);

    }

    public function SelectTracker(Type $var = null)
    {
        $Emp = DB::table('employees')->get();
        $data = [
            'Title' => 'Select staff member | Activity tracking',
            'Desc' => 'Select staff member whose activities are required',
            'Page' => 'Track.SelectStaff',
            'Staff' => $Emp,

        ];

        return view('scrn', $data);
    }

    public function StaffSelected(Request $request)
    {
        return redirect()->route('TrackStaffActivities', $request->id);
    }

    public function TrackStaffActivities($id)
    {

        $EmpID = DB::table('employees')->where('id', $id)->first();

        $FormEngine = new FormEngine();
        $rem = ['EmpID', 'CatID', 'email_verified_at', 'password', 'remember_token', 'created_at', 'Year', 'Status', 'Month', 'Supervisor', 'updated_at', 'ActivityID', 'ActID', 'EmpID', 'id', 'SupervisorComment'];

        $Cat = DB::table('tracking_categories')->where('EmpID', Auth::user()->EmpID)
            ->orderBy('created_at', 'Desc')->get();

        $MyActs = DB::table('trackings')->where('Supervisor', Auth::user()->EmpID)
            ->orderBy('created_at', 'Desc')->get();

        $Emp = DB::table('employees')->get();

        $counter = DB::table('trackings AS T')
            ->where('T.EmpID', $EmpID->EmpID)
            ->join('tracking_categories AS C', 'C.CatID', '=', 'T.CatID')
            ->join('employees AS E', 'E.EmpID', '=', 'T.Supervisor')
            ->orderBy('T.created_at', 'Desc')
            ->select('C.Category', 'C.Description AS Desc', 'T.*', 'E.StaffName')
            ->count();

        if ($counter < 1) {

            return redirect()->back()->with('error_a', 'The search query returned no result, Try again');

        }

        $Act = DB::table('trackings AS T')
            ->where('T.EmpID', $EmpID->EmpID)
            ->join('tracking_categories AS C', 'C.CatID', '=', 'T.CatID')
            ->join('employees AS E', 'E.EmpID', '=', 'T.Supervisor')
            ->orderBy('T.created_at', 'Desc')
            ->select('C.Category', 'C.Description AS Desc', 'T.*', 'E.StaffName')
            ->get();

        $data = [
            'Title' => 'Track the activity progress of the selected staff members',
            'Desc' => 'Activity progress report',
            'Page' => 'Track.ED',
            'rem' => $rem,
            'Cat' => $Cat,
            'Act' => $Act,
            'Emp' => $Emp,
            'Selected' => $EmpID->StaffName,
            'MyActs' => $MyActs,

        ];

        return view('scrn', $data);

    }

}