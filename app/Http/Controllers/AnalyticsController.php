<?php

namespace App\Http\Controllers;

use App\Charts\ChartEngine;
use App\Http\Controllers\Controller as Controller;
use App\Models\Activities;
use App\Models\ActivityCosts;
use App\Models\Grants;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $a = Activities::where('Month', null)
        ->where('Year', null)
        ->orWhere('Year', '')
        ->orWhere('Month', '')
        ->count();

        if ($a > 0) {
            $b = Activities::where('Month', null)
            ->where('Year', null)
            ->orWhere('Year', '')
            ->orWhere('Month', '')
            ->get();

            foreach ($b as $data) {
                $up = Activities::find($data->id);

                $up->Year = date('Y', strtotime($data->created_at));
                $up->Month = date('M', strtotime($data->created_at));
                $up->save();
            }
        }

        $aa = ActivityCosts::where('Month', null)
        ->where('Year', null)
        ->orWhere('Year', '')
        ->orWhere('Month', '')
        ->count();

        if ($aa > 0) {
            $bb = ActivityCosts::where('Month', null)
            ->where('Year', null)
            ->orWhere('Year', '')
            ->orWhere('Month', '')
            ->get();

            foreach ($bb as $dataz) {
                $upp = ActivityCosts::find($dataz->id);
                $upp->Year = date('Y', strtotime($dataz->created_at));
                $upp->Month = date('M', strtotime($dataz->created_at));
                $upp->save();
            }
        }

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

                $E->RecordStatus = 'expired';
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
                $DateNow = Carbon::createFromFormat('Y-m-d', date('Y-m-d'));

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

    public function GrantBVASelectYear()
    {
        $a = DB::table('activity_costs')->get();

        $ActivityCosts = ActivityCosts::all();

        $Grants = Grants::where('status', 'valid')->get();

        $data = [
            'Title' => 'Select grant and year to attach annual BVA report to',
            'Desc' => 'Annual BVA Report',
            'Page' => 'analytics.Select',
             'Activities' => $ActivityCosts,
             'Grants' => $Grants,
        ];

        return view('scrn', $data);
    }

    public function BVASelected(Request $request)
    {
        return redirect()->route('ReturnYearlyBVA', [
            'Year' => $request->Year,
            'id' => $request->id,
        ]);
    }

    public function ReturnYearlyBVA($id, $Year)
    {
        $Grants = Grants::find($id);

        $chart = new ChartEngine();
        $chart2 = new ChartEngine();

        $Budget = $Grants->AmountInUgx;

        $Actual = ActivityCosts::where('Year', '=', $Year)
        ->where('GID', $Grants->GID)
        ->sum('Subtotal');

        $Costs = DB::table('activity_costs AS A')
        ->where('A.GID', $Grants->GID)
        ->where('A.Year', '=', $Year)
        //->where('E.EmpID', $EmpID)
        ->join('activities AS AC', 'AC.AID', '=', 'A.AID')
        ->join('grants AS G', 'G.GID', '=', 'A.GID')
       ->join('donors AS D', 'D.DID', '=', 'A.DID')

        ->select('A.*', 'G.*', 'AC.*', 'A.id AS APID', 'D.*')
        ->get();

        if ($Costs->count() < 1) {
            return redirect()->back()->with('status', 'The selected query has returned empty results, Please select another one');
        }

        $Variance = $Budget - $Actual;

        $a = $Variance / $Budget;

        $BurnRate = $a * 100;

        $chart->labels(['Grant Amount', 'Actual Amount', 'Variance']);

        $chart->height(200);

        $chart->dataset('Grant BVA analysis (UGX)', 'bar', [$Budget, $Actual, $Variance])->color('#181c32')
        ->backgroundColor('#f1416c');

        $chart2->labels(['Grant Amount', 'Actual Amount', 'Variance']);

        $chart2->height(200);

        $chart2->dataset('Grant BVA analysis (UGX)', 'line', [$Budget, $Actual, $Variance])->color('#181c32')
       ->backgroundColor('#4a148c');

        $data = [
            'Title' => 'Annual  BVA analysis for the grant '.$Grants->GrantName,
            'Desc' => 'BVA analysis is based on activity costing',
            'Page' => 'analytics.YearBVAGrant',
            'chart' => $chart,
            'chart2' => $chart2,
            'Activities' => $Costs,
            'G' => $Grants,
            'Budget' => $Budget,
            'Variance' => $Variance,
            'Actual' => $Actual,
        ];

        return view('scrn', $data);
    }

    public function GrantValidityAnalysis()
    {
        $Grants = Grants::where('status', 'valid')->pluck('GrantName');
        $Months = Grants::where('status', 'valid')->pluck('ValidityMonths');

        $G = Grants::where('status', 'valid')->get();

        $chart = new ChartEngine();
        $chart2 = new ChartEngine();

        $chart->labels($Grants);
        $chart->height(200);
        $chart->dataset('Months to grant expiry', 'bar', $Months)
        ->color('#181c32')
        ->backgroundColor('#4a148c');

        $chart2->labels($Grants);
        $chart2->height(200);
        $chart2->dataset('Months to grant expiry', 'line', $Months)
        ->color('#181c32')
        ->backgroundColor('#f1416c');

        $data = [
            'Title' => 'Grant validity analysis (Months to expiry)',
            'Desc' => 'Grant validity analysis',
            'Page' => 'analytics.GrantVal',
            'chart' => $chart,
            'chart2' => $chart2,
            'Grants' => $G,
        ];

        return view('scrn', $data);
    }

    public function GrantValueAnalysis()
    {
        $Grants = Grants::where('status', 'valid')->pluck('GrantName');
        $AmountInUgx = Grants::where('status', 'valid')->pluck('AmountInUgx');

        $G = Grants::all();

        $chart = new ChartEngine();
        $chart2 = new ChartEngine();

        $chart->labels($Grants);
        $chart->height(200);
        $chart->dataset('Grant value in UGX', 'bar', $AmountInUgx)
        ->color('#181c32')
        ->backgroundColor('#f1416c');

        $data = [
            'Title' => 'Grant value analysis (UGX)',
            'Desc' => 'Grant value analysis | only active grants are tracked',
            'Page' => 'analytics.Grants',
            'chart' => $chart,

            'Grants' => $G,
        ];

        return view('scrn', $data);
    }

    public function DonorContributions()
    {
        $chart = new ChartEngine();
        $chart2 = new ChartEngine();

        $Amount = DB::table('donors AS D')
       ->join('grants AS G', 'G.DID', '=', 'D.DID')
       ->where('G.status', 'valid')
       ->groupBy('G.DID')
        ->pluck('G.AmountInUgx');

        $Donors = DB::table('donors AS D')
        ->join('grants AS G', 'G.DID', '=', 'D.DID')
        ->where('G.status', 'valid')
        ->groupBy('G.DID')
         ->pluck('D.Name');

        $DonorsData = DB::table('donors AS D')
        ->join('grants AS G', 'G.DID', '=', 'D.DID')
        ->where('G.status', 'valid')
        ->groupBy('G.DID')
         ->select('D.*', 'G.*', 'D.created_at AS date_a')
         ->get();

        $chart->labels($Donors);
        $chart->height(200);
        $chart->dataset('Donor Contribution Analysis', 'bar', $Amount)
         ->color('#181c32')
         ->backgroundColor('#4a148c');

        $chart2->labels($Donors);
        $chart2->height(200);
        $chart2->dataset('Donor Contribution Analysis', 'line', $Amount)
         ->color('#181c32')
         ->backgroundColor('#f1416c');

        $data = [
            'Title' => 'Donor contribution analysis',
            'Desc' => 'Only active grants are tracked',
            'Page' => 'analytics.Donors',
            'chart' => $chart,
            'chart2' => $chart2,
            'DonorsData' => $DonorsData,
        ];

        return view('scrn', $data);
    }
}
