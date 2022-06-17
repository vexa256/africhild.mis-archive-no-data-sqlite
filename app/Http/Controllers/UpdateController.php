<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function UpdateLogic(Request $request)
    {

        DB::table($request->TableName)->where('id', $request->id)
            ->update(
                $request->except([
                    '_token',
                    'TableName',
                    'id',
                ])
            );

        return redirect()->back()->with('status', 'The selected record was updated successfully');
    }
}
