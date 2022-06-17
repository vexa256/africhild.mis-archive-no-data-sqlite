<?php

namespace App\Http\Controllers;

use App\Models\BenefitAssigns;
use App\Models\BenefitLogs;
use App\Models\DeductionAssigns;
use App\Models\DeductionLogs;
use App\Models\Deductions;
use App\Models\HR\Employees;
use App\Models\Payroll;
use App\Models\SalaryBenefits;
use App\Models\TaxAssigns;
use App\Models\Taxes;
use App\Models\TaxLogs;
use DB;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function MgtDeductions()
    {
        $FormEngine = new FormEngine();

        $rem = ['DID', 'created_at', 'updated_at', 'id'];

        $Deductions = Deductions::all();

        $data = [
            'Title' => 'Manage salary deductions',
            'Desc' => 'Salary deduction settings',
            'Page' => 'deductions.Mgt',
            'Deductions' => $Deductions,
            'rem' => $rem,
            'Form' => $FormEngine->Form('deductions'),
        ];

        return view('scrn', $data);
    }

    public function NewDeduction(Request $request)
    {
        $validated = $this->validate($request, [
            'Deduction' => 'required|unique:deductions',
            'Description' => 'required',
            'Amount' => 'required',
            'DID' => 'required|unique:deductions',
        ]);

        Deductions::create($validated);

        return back()->with('status', 'New salary deduction created successfully');
    }

    public function DelDed($id)
    {
        Deductions::find($id)->delete();

        return back()->with('status', 'Salary deduction deleted successfully');
    }

    public function MgtTaxes()
    {
        $FormEngine = new FormEngine();

        $rem = ['TID', 'created_at', 'updated_at', 'id'];

        $Taxes = Taxes::all();

        $data = [
            'Title' => 'Manage salary deductions',
            'Desc' => 'Salary deduction settings',
            'Page' => 'tax.Mgt',
            'Taxes' => $Taxes,
            'rem' => $rem,
            'Form' => $FormEngine->Form('taxes'),
        ];

        return view('scrn', $data);
    }

    public function DelTax($id)
    {
        Taxes::find($id)->delete();

        return back()->with('status', 'Salary tax deleted successfully');
    }

    public function NewTax(Request $request)
    {
        if ($request->Percentage >= 100) {
            return back()->with('error_a', 'Salary tax not created. Tax percentage is above the acceptable value, Try again');
        }

        $validated = $this->validate($request, [
            'Tax' => 'required|unique:taxes',
            'Description' => 'required',
            'Percentage' => 'required',
            'TID' => 'required|unique:taxes',
        ]);

        Taxes::create($validated);

        return back()->with('status', 'New salary tax created successfully');
    }

    public function MgtBenefitsSalary()
    {
        $FormEngine = new FormEngine();

        $rem = ['BID', 'created_at', 'updated_at', 'id'];

        $SalaryBenefits = SalaryBenefits::all();

        $data = [
            'Title' => 'Manage salary benefits',
            'Desc' => 'Salary benefit settings',
            'Page' => 'benefits.Mgt',
            'SalaryBenefits' => $SalaryBenefits,
            'rem' => $rem,
            'Form' => $FormEngine->Form('salary_benefits'),
        ];

        return view('scrn', $data);
    }

    public function NewSalaryBen(Request $request)
    {
        $validated = $this->validate($request, [
            'Benefit' => 'required|unique:salary_benefits',
            'Description' => 'required',
            'Amount' => 'required',
            'BID' => 'required|unique:salary_benefits',
        ]);

        SalaryBenefits::create($validated);

        return back()->with('status', 'New salary benefit created successfully');
    }

    public function DelSalaryBen($id)
    {
        SalaryBenefits::find($id)->delete();

        return back()->with('status', 'Salary benefit deleted successfully');
    }

    public function SelectStaffPay()
    {
        $Employees = Employees::where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title' => 'Select staff member to attach payroll settings to',
            'Desc' => 'Advanced payroll settings',
            'Page' => 'payroll.Select',
            'Staff' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function StaffSelectedPay(Request $request)
    {
        return redirect()->route('ReturnPaySettings', ['id' => $request->id]);
    }

    public function ReturnPaySettings($id)
    {
        $E = Employees::find($id);

        $Salary = $E->MonthlySalary;

        $AssignedDeductions = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('deduction_assigns AS DE', 'DE.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DE.DID')
            ->select('E.*', 'DE.*', 'D.*', 'DE.id AS DIID')
            ->get();

        $AssignedBenefits = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('benefit_assigns AS BE', 'BE.EmpID', '=', 'E.EmpID')
            ->join('salary_benefits AS B', 'B.BID', '=', 'BE.BID')
            ->select('E.*', 'BE.*', 'B.*', 'BE.id AS BIID')
            ->get();

        $AssignedTaxes = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('tax_assigns AS TE', 'TE.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TE.TID')
            ->select('E.*', 'TE.*', 'T.*', 'TE.id AS TIID')
            ->get();

        $Salary = $E->MonthlySalary;
        $Deductions = $AssignedDeductions->sum('Amount');
        $Benefits = $AssignedBenefits->sum('Amount');
        $Taxes = $AssignedTaxes->sum('Percentage');

        $Tax_decimal = $Taxes / 100;

        $TaxableAmount = $Salary * $Tax_decimal;

        $TotalDeductions = $Deductions + $TaxableAmount;

        $Salary_a = $Salary - $TotalDeductions;
        $NetSalary = $Salary_a + $Benefits;

        $SBenefits = SalaryBenefits::all();
        $SDeductions = Deductions::all();
        $STaxes = Taxes::all();

        $data = [
            'Title' => 'Manage  payroll settings for '.$E->StaffName,
            'Desc' => 'Taxes , Benefits  and Deductions  Management',
            'Page' => 'payroll.Settings',
            'E' => $E,
            'Salary' => $Salary,
            'SBenefits' => $SBenefits,
            'SDeductions' => $SDeductions,
            'STaxes' => $STaxes,
            'Deductions' => $Deductions,
            'Benefits' => $Benefits,
            'TaxableAmount' => $TaxableAmount,
            'NetSalary' => $NetSalary,
            'Salary' => $Salary,
            'AssignedDeductions' => $AssignedDeductions,
            'AssignedBenefits' => $AssignedBenefits,
            'AssignedTaxes' => $AssignedTaxes,
        ];

        return view('scrn', $data);
    }

    public function NewBenA(Request $request)
    {
        $validated = $this->validate($request, [
            'EmpID' => 'required',
            'BID' => 'required',
        ]);

        $count = BenefitAssigns::where('EmpID', $request->EmpID)
            ->where('BID', $request->BID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with('error_a', 'Benefit already assigned to the selected staffmember');
        }

        BenefitAssigns::create($validated);

        return back()->with('status', 'Salary benefit assigned successfully to the selected staff member');
    }

    public function AssignDeduction(Request $request)
    {
        $validated = $this->validate($request, [
            'EmpID' => 'required',
            'DID' => 'required',
        ]);

        $count = DeductionAssigns::where('EmpID', $request->EmpID)
            ->where('DID', $request->DID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with('error_a', 'Deduction already assigned to the selected staffmember');
        }

        DeductionAssigns::create($validated);

        return back()->with('status', 'Salary deduction assigned successfully to the selected staff member');
    }

    public function AssignTax(Request $request)
    {
        $validated = $this->validate($request, [
            'EmpID' => 'required',
            'TID' => 'required',
        ]);

        $count = TaxAssigns::where('EmpID', $request->EmpID)
            ->where('TID', $request->TID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with('error_a', 'Tax already assigned to the selected staffmember');
        }

        TaxAssigns::create($validated);

        return back()->with('status', 'Salary tax assigned successfully to the selected staff member');
    }

    public function DeleteBenefit($id)
    {
        BenefitAssigns::find($id)->delete();

        return back()->with('status', 'Salary benefit assignment reversed successfully ');
    }

    public function DeleteDeduction($id)
    {
        DeductionAssigns::find($id)->delete();

        return back()->with('status', 'Salary deduction assignment reversed successfully ');
    }

    public function DeleteTaxAssign($id)
    {
        TaxAssigns::find($id)->delete();

        return back()->with('status', 'Salary tax assignment reversed successfully ');
    }

    public function SelectStaffExecPay()
    {
        $Employees = Employees::where('RecordStatus', 'Contract Active')
            ->get();

        $data = [
            'Title' => 'Select staff member to attach payroll action to',
            'Desc' => 'Payroll Execution',
            'Page' => 'payroll.SelectPay',
            'Staff' => $Employees,
        ];

        return view('scrn', $data);
    }

    public function ExecPaySelected(Request $request)
    {
        return redirect()->route('ExecPay', ['id' => $request->id]);
    }

    public function ExecPay($id)
    {
        $E = Employees::find($id);

        $Salary = $E->MonthlySalary;

        $AssignedDeductions = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('deduction_assigns AS DE', 'DE.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DE.DID')
            ->select('E.*', 'DE.*', 'D.*', 'DE.id AS DIID')
            ->get();

        $AssignedBenefits = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('benefit_assigns AS BE', 'BE.EmpID', '=', 'E.EmpID')
            ->join('salary_benefits AS B', 'B.BID', '=', 'BE.BID')
            ->select('E.*', 'BE.*', 'B.*', 'BE.id AS BIID')
            ->get();

        $AssignedTaxes = DB::table('employees AS E')
            ->where('E.id', $id)
            ->join('tax_assigns AS TE', 'TE.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TE.TID')
            ->select('E.*', 'TE.*', 'T.*', 'TE.id AS TIID')
            ->get();

        $Salary = $E->MonthlySalary;
        $Deductions = $AssignedDeductions->sum('Amount');
        $Benefits = $AssignedBenefits->sum('Amount');
        $Taxes = $AssignedTaxes->sum('Percentage');

        $Tax_decimal = $Taxes / 100;

        $TaxableAmount = $Salary * $Tax_decimal;

        $TotalDeductions = $Deductions + $TaxableAmount;

        $Salary_a = $Salary - $TotalDeductions;
        $NetSalary = $Salary_a + $Benefits;

        $SBenefits = SalaryBenefits::all();
        $SDeductions = Deductions::all();
        $STaxes = Taxes::all();

        $Payroll = $this->ReturnPayRoll($E->EmpID);

        $data = [
            'Title' => 'Manage  payroll settings for '.$E->StaffName,
            'Desc' => 'Taxes , Benefits  and Deductions  Management',
            'Page' => 'payroll.Payroll',
            'E' => $E,
            'Salary' => $Salary,
            'Payroll' => $Payroll,
            'SBenefits' => $SBenefits,
            'SDeductions' => $SDeductions,
            'STaxes' => $STaxes,
            'Deductions' => $Deductions,
            'Benefits' => $Benefits,
            'TaxableAmount' => $TaxableAmount,
            'NetSalary' => $NetSalary,
            'Salary' => $Salary,
            'AssignedDeductions' => $AssignedDeductions,
            'AssignedBenefits' => $AssignedBenefits,
            'AssignedTaxes' => $AssignedTaxes,
            'ReturnBenLogs' => $this->ReturnBenLogs($E->EmpID),
            'ReturnTaxLogs' => $this->ReturnTaxLogs($E->EmpID),
            'ReturnDedLogs' => $this->ReturnDedLogs($E->EmpID),
        ];

        return view('scrn', $data);
    }

    public function ReturnPayRoll($EmpID)
    {
        $data = DB::table('employees AS E')

            ->where('E.EmpID', $EmpID)

            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')

            ->select('P.*', 'E.*', 'P.id AS PPID', 'P.Deduction AS D',
                'P.created_at AS CT')->get();

        return $data;
    }

    public function RunPayroll(Request $request)
    {
        $count = Payroll::where('Month', $request->Month)
            ->where('Year', $request->Year)
            ->where('EmpID', $request->EmpID)
            ->count();

        if ($count > 0) {
            return redirect()->back()->with('error_a', 'New payroll transaction not executed. The selected month has already been paid out');
        }

        $validated = $this->validate($request, [
            'Month' => 'required',
            'Year' => 'required',
            'EmpID' => 'required',
            'PayID' => 'required',
            'Deduction' => 'required',
            'Benefits' => 'required',
            'Taxes' => 'required',
            'SalaryPaid' => 'required',
            'GrossSalary' => 'required',
            'Description' => 'required',
        ]);

        Payroll::create($validated);

        $this->LogData($request->EmpID, $request->PayID);

        return redirect()->back()->with('status', 'New payroll transaction recorded successfully');
    }

    public function LogData($EmpID, $PayID)
    {
        $TaxesLog = new TaxLogs();
        $BenefitsLog = new BenefitLogs();
        $DeductionsLog = new DeductionLogs();

        $Tax = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('tax_assigns AS TA', 'TA.EmpID', '=', 'E.EmpID')
            ->join('taxes AS T', 'T.TID', '=', 'TA.TID')
            ->select('T.*', 'TA.*', 'E.*')
            ->get();

        $Benefits = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('benefit_assigns AS BA', 'BA.EmpID', '=', 'E.EmpID')
            ->join('salary_benefits AS B', 'B.BID', '=', 'BA.BID')
            ->select('B.*', 'BA.*', 'E.*')
            ->get();

        $Deductions = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('deduction_assigns AS DA', 'DA.EmpID', '=', 'E.EmpID')
            ->join('deductions AS D', 'D.DID', '=', 'DA.DID')
            ->select('D.*', 'DA.*', 'E.*')
            ->get();

        foreach ($Tax as $data) {
            $TaxesLog->TID = $data->TID;
            $TaxesLog->Tax = $data->Tax;
            $TaxesLog->Description = $data->Description;
            $TaxesLog->Percentage = $data->Percentage;
            $TaxesLog->PayID = $PayID;
            $TaxesLog->save();
        }

        foreach ($Benefits as $data) {
            $BenefitsLog->BID = $data->BID;
            $BenefitsLog->Benefit = $data->Benefit;
            $BenefitsLog->Description = $data->Description;
            $BenefitsLog->Amount = $data->Amount;
            $BenefitsLog->PayID = $PayID;
            $BenefitsLog->save();
        }

        foreach ($Deductions as $data) {
            $DeductionsLog->DID = $data->DID;
            $DeductionsLog->Deduction = $data->Deduction;
            $DeductionsLog->Description = $data->Description;
            $DeductionsLog->Amount = $data->Amount;
            $DeductionsLog->PayID = $PayID;
            $DeductionsLog->save();
        }

        return true;
    }

    public function ReversePayroll($id)
    {
        $a = Payroll::find($id);
        $PayID = $a->PayID;

        TaxLogs::where('PID', $PayID)->delete();
        BenefitLogs::where('PID', $PayID)->delete();
        DeductionLogs::where('PID', $PayID)->delete();

        $a->delete();

        return redirect()->back()->with('status', 'New payroll transaction reversed successfully');
    }

    public function ReturnBenLogs($EmpID)
    {
        $data = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->join('benefit_logs AS B', 'B.PayID', '=', 'P.PayID')
            ->select('P.*', 'E.*', 'P.id AS PPID', 'B.*',
                'P.Deduction AS D',
                'B.Amount AS BAmount',
                'B.created_at AS ct',
            )
            ->get();

        return $data;
    }

    public function ReturnTaxLogs($EmpID)
    {
        $data = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->join('tax_logs AS T', 'T.PayID', '=', 'P.PayID')

            ->select('P.*', 'E.*', 'P.id AS PPID', 'T.*',
                'P.Deduction AS D',
                'T.created_at AS ct',
            )
            ->get();

        return $data;
    }

    public function ReturnDedLogs($EmpID)
    {
        $data = DB::table('employees AS E')
            ->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->join('deduction_logs AS D', 'D.PayID', '=', 'P.PayID')
            ->select('P.*', 'E.*', 'P.id AS PPID', 'D.*',
                'P.Deduction AS D',
                'D.Deduction AS Ded',
                'D.created_at AS ct',
            )
            ->get();

        return $data;
    }

    public function SelectMonthRep()
    {
        $Months = Payroll::select('Month')->get();

        $Years = Payroll::select('Year')->get();

        $data = [
            'Title' => 'Select month and year to attach payroll report to',
            'Desc' => 'Monthly payroll report',
            'Page' => 'payroll.SelectMonth',
            'Years' => $Years,
            'Months' => $Months,
        ];

        return view('scrn', $data);
    }

    public function MonthlyPayReport(Request $request)
    {
        $validated = $this->validate($request, [
            'Year' => 'required',
            'Month' => 'required',
        ]);

        $Payroll = DB::table('employees AS E')
            //->where('E.EmpID', $EmpID)
            ->join('payrolls AS P', 'P.EmpID', '=', 'E.EmpID')
            ->where('P.Month', '=', $request->Month)
            ->where('P.Year', '=', $request->Year)
            ->join('deduction_logs AS D', 'D.PayID', '=', 'P.PayID')
            ->select('P.*', 'E.*', 'P.id AS PPID', 'D.*',
                'P.Deduction AS D',
                'D.Deduction AS Ded',
                'D.created_at AS CT',
            )
            ->get();

        $data = [
            'Title' => 'Payroll report for the month '.$request->Month.' and year '.$request->Year,
            'Desc' => 'Monthly payroll report | Filtered by year and month',
            'Page' => 'payroll.RepMonth',
            'Payroll' => $Payroll,
            'Year' => $request->Year,
            'Month' => $request->Month,
        ];

        return view('scrn', $data);
    }
}
