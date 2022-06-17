<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UpdateLogic extends Controller
{
    public function UpdateLogic(Request $request)
    {

        if ('staff' == $request->TableName) {

            DB::table($request->TableName)->where('id', $request->id)
                ->update(
                    $request->except([
                        '_token',
                        'TableName',
                        'id',
                    ])
                );

            $User = User::where('EmpID', $request->EmpID)->first();

            $User->name = $request->Name;
            $User->Privileges = $request->Privileges;

            $User->save();

            return redirect()->back()->with('status', 'The selected record was updated successfully');

        } elseif ('items' == $request->TableName) {

            $Item = DB::table($request->TableName)->where('id', $request->id)->first();

            DB::table($request->TableName)->where('id', $request->id)
                ->update(
                    $request->except([
                        '_token',
                        'TableName',
                        'id',
                    ])
                );

            DB::table('restock_logs')->insert([
                'Item' => $Item->Item,
                'IID' => $Item->IID,
                'CID' => $Item->CID,
                'BriefDesc' => $Item->BriefDesc,
                'Qty' => $request->Qty,
                'EmpID' => $request->EmpID,
                'created_at' => $request->created_at,

            ]);

        } else {

            // dd($request->TableName);

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

    public function MassDelete($id, $TableName)
    {

        DB::table($TableName)->where('id', $id)->delete();

        return redirect()->back()->with('status', 'The selected record was deleted successfully');

    }

    public function CMSUpdate(Request $request)
    {

        $validated = $this->validate($request, [
            '*' => 'nullable',
        ]);

        if ($request->hasFile('URL')) {

            $up = DB::table($request->TableName)->where('id', $request->id)->first();

            unlink(public_path($up->URL));

            $FileName = time() . '.' . $request->URL->extension();

            $request->URL->move(public_path('assets/docs'), $FileName);

            DB::table($request->TableName)->where('id', $request->id)
                ->update(
                    $request->except([
                        '_token',
                        'TableName',
                        'id',
                    ])
                );

            DB::table($request->TableName)->where('id', $request->id)->update([

                'URL' => 'assets/docs/' . $FileName,
            ]);

            return redirect()->back()->with('status', 'The selected record was updated successfully');

        } elseif ($request->hasFile('Thumbnail')) {

            $up = DB::table($request->TableName)->where('id', $request->id)->first();

            unlink(public_path($up->Thumbnail));

            $FileName = time() . '.' . $request->Thumbnail->extension();

            $request->Thumbnail->move(public_path('assets/docs'), $FileName);

            DB::table($request->TableName)->where('id', $request->id)
                ->update(
                    $request->except([
                        '_token',
                        'TableName',
                        'id',
                    ])
                );
            DB::table($request->TableName)->where('id', $request->id)->update([

                'Thumbnail' => 'assets/docs/' . $FileName,
            ]);

            return redirect()->back()->with('status', 'The selected record was updated successfully');

        } elseif ($request->hasFile('Thumbnail') && $request->hasFile('URL')) {

            $up = DB::table($request->TableName)->where('id', $request->id)->first();

            unlink(public_path($up->Thumbnail));

            $FileName1 = time() . '.' . $request->Thumbnail->extension();

            $request->Thumbnail->move(public_path('assets/docs'), $FileName1);

            unlink(public_path($up->URL));

            $FileName = time() . '.' . $request->URL->extension();

            $request->URL->move(public_path('assets/docs'), $FileName);

            DB::table($request->TableName)->where('id', $request->id)
                ->update(
                    $request->except([
                        '_token',
                        'TableName',
                        'id',
                    ])
                );

            DB::table($request->TableName)->where('id', $request->id)->update([

                'Thumbnail' => 'assets/docs/' . $FileName1,
                'URL' => 'assets/docs/' . $FileName,
            ]);

            return redirect()->back()->with('status', 'The selected record was updated successfully');

        } else {

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

    public function NewRecord(Request $request)
    {
        $validated = $this->validate($request, [
            '*' => 'nullable',
        ]);

        if ($request->TableName == 'trackings') {

            $timestamp = strtotime($request->StartDate);

            $Year = date('Y', $timestamp);

            $Month = date('M', $timestamp);

            DB::table($request->TableName)->insert(
                $request->except([
                    '_token',
                    'TableName',
                    'id',
                ])
            );

            DB::table($request->TableName)->where('ActivityID', $request->ActivityID)->update(
                [
                    'Month' => $Month,
                    'Year' => $Year,
                ]
            );

            return redirect()->back()->with('status', 'New record created successfully');

        } else {

            DB::table($request->TableName)->insert(
                $request->except([
                    '_token',
                    'TableName',
                    'id',
                ])
            );

        }

        return redirect()->back()->with('status', 'New record created successfully');

    }
}