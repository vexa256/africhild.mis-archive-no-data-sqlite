<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Carbon\Carbon;

class System extends Controller
{

    public function StartProjectValidity()
    {

        $Count = Projects::whereDate('ProjectExpiry', '<', date('Y-m-d'))
            ->where('status', 'valid')
            ->count();

        if ($Count > 0) {

            $Projects = Projects::whereDate('ProjectExpiry', '<', date('Y-m-d'))
                ->where('status', 'valid')
                ->get();

            foreach ($Projects as $data) {

                $E = Projects::find($data->id);

                $E->RecordStatus = "expired";
                $E->save();

            }

        }

        /***next pub fun */
        $Count = Projects::where('status', 'valid')
            ->count();

        if ($Count > 0) {

            $Projects = Projects::where('status', 'valid')
                ->get();

            foreach ($Projects as $data) {

                $E = Projects::find($data->id);

                $ConExpiry = Carbon::createFromFormat('Y-m-d', $E->ProjectExpiry);
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
}
