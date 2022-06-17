<?php

use App\Http\Controllers\ContractorController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MainHumanResource;
use Illuminate\Support\Facades\Route;

Route::get('SelectMonthRep', [FinanceController::class, 'SelectMonthRep'])->name('SelectMonthRep')->middleware('auth');

Route::post('MonthlyPayReport', [FinanceController::class, 'MonthlyPayReport'])->name('MonthlyPayReport')->middleware('auth');

Route::post('ExtendCon', [MainHumanResource::class, 'ExtendCon'])->name('ExtendCon')->middleware('auth');

Route::post('UpdateEmp', [MainHumanResource::class, 'UpdateEmp'])->name('UpdateEmp')->middleware('auth');

Route::post('UpdateAcc', [MainHumanResource::class, 'UpdateAcc'])->name('UpdateAcc')->middleware('auth');

Route::get('DelUserAccount/{id}', [MainHumanResource::class, 'DelUserAccount'])->name('DelUserAccount')->middleware('auth');

Route::post('NewRoles', [MainHumanResource::class, 'NewRoles'])->name('NewRoles')->middleware('auth');

Route::get('MgtUsers', [MainHumanResource::class, 'MgtUsers'])->name('MgtUsers')->middleware('auth');

Route::get('HRDash', [LeaveController::class, 'HRDash'])->name('HRDash')->middleware('auth');

Route::post('DeclineLeave', [LeaveController::class, 'DeclineLeave'])->name('DeclineLeave')->middleware('auth');

Route::post('ApproveLeave', [LeaveController::class, 'ApproveLeave'])->name('ApproveLeave')->middleware('auth');

Route::get('LeaveApproval', [LeaveController::class, 'LeaveApproval'])->name('LeaveApproval')->middleware('auth');

Route::get('TerminateLeave/{id}', [LeaveController::class, 'TerminateLeave'])->name('TerminateLeave')->middleware('auth');

Route::post('NewApp', [LeaveController::class, 'NewApp'])->name('NewApp')->middleware('auth');

Route::get('ApplyForLeave/{id}', [LeaveController::class, 'ApplyForLeave'])->name('ApplyForLeave')->middleware('auth');

Route::post('LeaveIdSelected', [LeaveController::class, 'LeaveIdSelected'])->name('LeaveIdSelected')->middleware('auth');

Route::get('SelectLeaveApply', [LeaveController::class, 'SelectLeaveApply'])->name('SelectLeaveApply')->middleware('auth');

Route::get('RevokeLeaveRight/{id}', [LeaveController::class, 'RevokeLeaveRight'])->name('RevokeLeaveRight')->middleware('auth');

Route::get('RevokeLeaveRight/{id}', [LeaveController::class, 'RevokeLeaveRight'])->name('RevokeLeaveRight')->middleware('auth');

Route::post('AcceptAssign', [LeaveController::class, 'AcceptAssign'])->name('AcceptAssign')->middleware('auth');

Route::get('LeaveAssignment/{id}', [LeaveController::class, 'LeaveAssignment'])->name('LeaveAssignment')->middleware('auth');

Route::post('LeaveSelected', [LeaveController::class, 'LeaveSelected'])->name('LeaveSelected')->middleware('auth');

Route::get('AssignLeave', [LeaveController::class, 'AssignLeave'])->name('AssignLeave')->middleware('auth');

Route::get('DeleteLeaveCat/{id}', [LeaveController::class, 'DeleteLeaveCat'])->name('DeleteLeaveCat')->middleware('auth');

Route::post('NewLeave', [LeaveController::class, 'NewLeave'])->name('NewLeave')->middleware('auth');

Route::get('LeaveSettings', [LeaveController::class, 'LeaveSettings'])->name('LeaveSettings')->middleware('auth');

Route::get('ConExpiredCons', [ContractorController::class, 'ConExpiredCons'])->name('ConExpiredCons')->middleware('auth');

Route::get('ConSoonExpiring', [ContractorController::class, 'ConSoonExpiring'])->name('ConSoonExpiring')->middleware('auth');

Route::get('ContractorConTrack', [ContractorController::class, 'ContractorConTrack'])->name('ContractorConTrack')->middleware('auth');

Route::post('NewConDoc', [ContractorController::class, 'NewConDoc'])->name('NewConDoc')->middleware('auth');

Route::get('ConReturnDocs/{id}', [ContractorController::class, 'ConReturnDocs'])->name('ConReturnDocs')->middleware('auth');

Route::post('ConDocsSelected', [ContractorController::class, 'ConDocsSelected'])->name('ConDocsSelected')->middleware('auth');

Route::get('SelectConDocs', [ContractorController::class, 'SelectConDocs'])->name('SelectConDocs')->middleware('auth');

Route::get('DelCon/{id}', [ContractorController::class, 'DelCon'])->name('DelCon')->middleware('auth');

Route::get('ConContractTerm/{id}', [ContractorController::class, 'ConContractTerm'])->name('ConContractTerm')->middleware('auth');

Route::get('ConContractTerm/{id}', [ContractorController::class, 'ConContractTerm'])->name('ConContractTerm')->middleware('auth');

Route::post('NewCon', [ContractorController::class, 'NewCon'])->name('NewCon')->middleware('auth');

Route::get('MgtCons', [ContractorController::class, 'MgtCons'])->name('MgtCons')->middleware('auth');

Route::get('ReversePayroll/{id}', [FinanceController::class, 'ReversePayroll'])->name('ReversePayroll')->middleware('auth');

Route::post('RunPayroll', [FinanceController::class, 'RunPayroll'])->name('RunPayroll')->middleware('auth');

Route::get('ExecPay/{id}', [FinanceController::class, 'ExecPay'])->name('ExecPay')->middleware('auth');

Route::post('ExecPaySelected', [FinanceController::class, 'ExecPaySelected'])->name('ExecPaySelected')->middleware('auth');

Route::get('SelectStaffExecPay', [FinanceController::class, 'SelectStaffExecPay'])->name('SelectStaffExecPay')->middleware('auth');

Route::post('AssignTax', [FinanceController::class, 'AssignTax'])->name('AssignTax')->middleware('auth');

Route::post('AssignDeduction', [FinanceController::class, 'AssignDeduction'])->name('AssignDeduction')->middleware('auth');

Route::get('DeleteBenefit/{id}', [FinanceController::class, 'DeleteBenefit'])->name('DeleteBenefit')->middleware('auth');

Route::get('DeleteDeduction/{id}', [FinanceController::class, 'DeleteDeduction'])->name('DeleteDeduction')->middleware('auth');

Route::get('DeleteTaxAssign/{id}', [FinanceController::class, 'DeleteTaxAssign'])->name('DeleteTaxAssign')->middleware('auth');

Route::post('NewBenA', [FinanceController::class, 'NewBenA'])->name('NewBenA')->middleware('auth');

Route::get('ReturnPaySettings/{id}', [FinanceController::class, 'ReturnPaySettings'])->name('ReturnPaySettings')->middleware('auth');

Route::post('StaffSelectedPay', [FinanceController::class, 'StaffSelectedPay'])->name('StaffSelectedPay')->middleware('auth');

Route::get('SelectStaffPay', [FinanceController::class, 'SelectStaffPay'])->name('SelectStaffPay')->middleware('auth');

Route::get('DelSalaryBen/{id}', [FinanceController::class, 'DelSalaryBen'])->name('DelSalaryBen')->middleware('auth');

Route::get('DelTax/{id}', [FinanceController::class, 'DelTax'])->name('DelTax')->middleware('auth');

Route::post('NewSalaryBen', [FinanceController::class, 'NewSalaryBen'])->name('NewSalaryBen')->middleware('auth');

Route::get('MgtBenefitsSalary', [FinanceController::class, 'MgtBenefitsSalary'])->name('MgtBenefitsSalary')->middleware('auth');

Route::post('NewTax', [FinanceController::class, 'NewTax'])->name('NewTax')->middleware('auth');

Route::get('MgtTaxes', [FinanceController::class, 'MgtTaxes'])->name('MgtTaxes')->middleware('auth');

Route::get('DelDed/{id}', [FinanceController::class, 'DelDed'])->name('DelDed')->middleware('auth');

Route::post('NewDeduction', [FinanceController::class, 'NewDeduction'])->name('NewDeduction')->middleware('auth');

Route::get('MgtDeductions', [FinanceController::class, 'MgtDeductions'])->name('MgtDeductions')->middleware('auth');

Route::post('NewBeneficiary', [MainHumanResource::class, 'NewBeneficiary'])->name('NewBeneficiary')->middleware('auth');

Route::get('MgtStaffBens/{id}', [MainHumanResource::class, 'MgtStaffBens'])->name('MgtStaffBens')->middleware('auth');

Route::post('BenStaffSelected', [MainHumanResource::class, 'BenStaffSelected'])->name('BenStaffSelected')->middleware('auth');

Route::get('SelectBenStaff', [MainHumanResource::class, 'SelectBenStaff'])->name('SelectBenStaff')->middleware('auth');

Route::post('NewBenCat', [MainHumanResource::class, 'NewBenCat'])->name('NewBenCat')->middleware('auth');

Route::get('MgtBenefits', [MainHumanResource::class, 'MgtBenefits'])->name('MgtBenefits')->middleware('auth');

Route::post('NewKin', [MainHumanResource::class, 'NewKin'])->name('NewKin')->middleware('auth');

Route::get('DelNOK/{id}', [MainHumanResource::class, 'DelNOK'])->name('DelNOK')->middleware('auth');

Route::get('MgtNoks/{id}', [MainHumanResource::class, 'MgtNoks'])->name('MgtNoks')->middleware('auth');

Route::post('StaffSelectedNOK', [MainHumanResource::class, 'StaffSelectedNOK'])->name('StaffSelectedNOK')->middleware('auth');

Route::get('SelectStaffNOK', [MainHumanResource::class, 'SelectStaffNOK'])->name('SelectStaffNOK')->middleware('auth');

Route::post('NewNotice', [MainHumanResource::class, 'NewNotice'])->name('NewNotice')->middleware('auth');

Route::get('Noticeboard', [MainHumanResource::class, 'Noticeboard'])->name('Noticeboard')->middleware('auth');

Route::get('ConTrack', [MainHumanResource::class, 'ConTrack'])->name('ConTrack')->middleware('auth');

Route::get('DelDoc/{id}', [MainHumanResource::class, 'DelDoc'])->name('DelDoc')->middleware('auth');

Route::post('NewDoc', [MainHumanResource::class, 'NewDoc'])->name('NewDoc')->middleware('auth');

Route::get('ReturnDocs/{id}', [MainHumanResource::class, 'ReturnDocs'])->name('ReturnDocs')->middleware('auth');

Route::post('DocsSelected', [MainHumanResource::class, 'DocsSelected'])->name('DocsSelected')->middleware('auth');

Route::get('SelectStaffDocs', [MainHumanResource::class, 'SelectStaffDocs'])->name('SelectStaffDocs')->middleware('auth');

Route::get('SoonExpiring', [MainHumanResource::class, 'SoonExpiring'])->name('SoonExpiring')->middleware('auth');

Route::get('ReverseCon/{id}', [MainHumanResource::class, 'ReverseCon'])->name('ReverseCon')->middleware('auth');

Route::get('ExpiredCons', [MainHumanResource::class, 'ExpiredCons'])->name('ExpiredCons')->middleware('auth');

Route::get('TerminateContract/{id}', [MainHumanResource::class, 'TerminateContract'])->name('TerminateContract')->middleware('auth');

Route::get('DelEmp/{id}', [MainHumanResource::class, 'DelEmp'])->name('DelEmp')->middleware('auth');

Route::get('ContractTerm/{id}', [MainHumanResource::class, 'ContractTerm'])->name('ContractTerm')->middleware('auth');

Route::post('NewEmp', [MainHumanResource::class, 'NewEmp'])->name('NewEmp')->middleware('auth');

Route::get('MgtEmp', [MainHumanResource::class, 'MgtEmp'])->name('MgtEmp')->middleware('auth');

Route::post('NewRole', [MainHumanResource::class, 'NewRole'])->name('NewRole')->middleware('auth');

Route::get('MgtRoles', [MainHumanResource::class, 'MgtRoles'])->name('MgtRoles')->middleware('auth');

Route::post('NewDept', [MainHumanResource::class, 'NewDept'])->name('NewDept')->middleware('auth');

Route::get('MgtDepts', [MainHumanResource::class, 'MgtDepts'])->name('MgtDepts')->middleware('auth');

Route::get('DelRole/{id}', [MainHumanResource::class, 'DelRole'])->name('DelRole')->middleware('auth');

Route::get('DelDept/{id}', [MainHumanResource::class, 'DelDept'])->name('DeleteDept')->middleware('auth');
