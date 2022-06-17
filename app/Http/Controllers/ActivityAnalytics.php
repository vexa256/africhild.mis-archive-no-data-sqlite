<?php

namespace App\Http\Controllers;

use DB;

class ActivityAnalytics extends Controller
{
    public function SelectActivities(Type $var = null)
    {

        return redirect()->back()->with('error_a', 'Project management analytics database is not accurate, Please complete data entry');

        $Activities = DB::table('activities AS A')
            ->join('projects AS P', 'P.PID', '=', 'A.PID')
            ->join('grants AS G', 'G.GID', '=', 'A.GID')
            ->join('donors AS D', 'D.DID', '=', 'A.DID')
            ->select('P.ProjectName', 'A.*')
            ->get();

        $data = [
            'Title' => 'Select Activity to attach a grant impact report to',
            'Desc' => 'Activity BVA | Grant impact report',
            'Page' => 'stat.SelectActivity',
            'Activities' => $Activities,
        ];

        return view('scrn', $data);
    }
}