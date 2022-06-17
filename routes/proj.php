<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('DonorContributions', [AnalyticsController::class, 'DonorContributions'])->name('DonorContributions')->middleware('auth');

Route::get('GrantValueAnalysis', [AnalyticsController::class, 'GrantValueAnalysis'])->name('GrantValueAnalysis')->middleware('auth');

Route::get('GrantValidityAnalysis', [AnalyticsController::class, 'GrantValidityAnalysis'])->name('GrantValidityAnalysis')->middleware('auth');

Route::get('ReturnYearlyBVA/{id}/{Year}', [AnalyticsController::class, 'ReturnYearlyBVA'])->name('ReturnYearlyBVA')->middleware('auth');

Route::post('BVASelected', [AnalyticsController::class, 'BVASelected'])->name('BVASelected')->middleware('auth');

Route::get('GrantBVASelectYear', [AnalyticsController::class, 'GrantBVASelectYear'])->name('GrantBVASelectYear')->middleware('auth');

Route::get('DelCostAct/{id}', [ProjectController::class, 'DelCostAct'])->name('DelCostAct')->middleware('auth');

Route::post('NewCosting', [ProjectController::class, 'NewCosting'])->name('NewCosting')->middleware('auth');

Route::post('UpdateGrant', [ProjectController::class, 'UpdateGrant'])->name('UpdateGrant')->middleware('auth');

Route::get('ReturnActCosting/{id}', [ProjectController::class, 'ReturnActCosting'])->name('ReturnActCosting')->middleware('auth');

Route::post('ActSelected', [ProjectController::class, 'ActSelected'])->name('ActSelected')->middleware('auth');

Route::get('ReturnActivityCosts/{id}', [ProjectController::class, 'ReturnActivityCosts'])->name('ReturnActivityCosts')->middleware('auth');

Route::post('CostGrantSelected', [ProjectController::class, 'CostGrantSelected'])->name('CostGrantSelected')->middleware('auth');

Route::get('SelectGrantActCost', [ProjectController::class, 'SelectGrantActCost'])->name('SelectGrantActCost')->middleware('auth');

Route::get('DelBroadCat/{id}', [ProjectController::class, 'DelBroadCat'])->name('DelBroadCat')->middleware('auth');

Route::post('NewBroadCat', [ProjectController::class, 'NewBroadCat'])->name('NewBroadCat')->middleware('auth');

Route::get('MgtBroadCats', [ProjectController::class, 'MgtBroadCats'])->name('MgtBroadCats')->middleware('auth');

Route::post('UpdateDonor', [ProjectController::class, 'UpdateDonor'])->name('UpdateDonor')->middleware('auth');

Route::get('BvaReport/{id}', [ProjectController::class, 'BvaReport'])->name('BvaReport')->middleware('auth');

Route::post('BvaSelected', [ProjectController::class, 'BvaSelected'])->name('BvaSelected')->middleware('auth');

Route::get('SelectGrantBVA', [ProjectController::class, 'SelectGrantBVA'])->name('SelectGrantBVA')->middleware('auth');

Route::get('DelCost/{id}', [ProjectController::class, 'DelCost'])->name('DelCost')->middleware('auth');

Route::post('NewCost', [ProjectController::class, 'NewCost'])->name('NewCost')->middleware('auth');

Route::get('MgtCosts/{id}', [ProjectController::class, 'MgtCosts'])->name('MgtCosts')->middleware('auth');

Route::post('GoToCosts', [ProjectController::class, 'GoToCosts'])->name('GoToCosts')->middleware('auth');

Route::post('CostSelectedProject', [ProjectController::class, 'CostSelectedProject'])->name('CostSelectedProject')->middleware('auth');

Route::get('SelectProjActCost', [ProjectController::class, 'SelectProjActCost'])->name('SelectProjActCost')->middleware('auth');

Route::get('DelActivity/{id}', [ProjectController::class, 'DelActivity'])->name('DelActivity')->middleware('auth');

Route::post('NewActivity', [ProjectController::class, 'NewActivity'])->name('NewActivity')->middleware('auth');

Route::get('ActivityDatabase/{id}', [ProjectController::class, 'ActivityDatabase'])->name('ActivityDatabase')->middleware('auth');

Route::post('ProjectSelected', [ProjectController::class, 'ProjectSelected'])->name('ProjectSelected')->middleware('auth');

Route::get('SelectProjAct', [ProjectController::class, 'SelectProjAct'])->name('SelectProjAct')->middleware('auth');

Route::get('ProjectValidity', [ProjectController::class, 'ProjectValidity'])->name('ProjectValidity')->middleware('auth');

Route::post('ExtendProjectValidity', [ProjectController::class, 'ExtendProjectValidity'])->name('ExtendProjectValidity')->middleware('auth');

Route::get('DelProj/{id}', [ProjectController::class, 'DelProj'])->name('DelProj')->middleware('auth');

Route::get('DelProj/{id}', [ProjectController::class, 'DelProj'])->name('DelProj')->middleware('auth');

Route::post('NewProject', [ProjectController::class, 'NewProject'])->name('NewProject')->middleware('auth');

Route::get('Projects', [ProjectController::class, 'Projects'])->name('Projects')->middleware('auth');

Route::get('GrantValidity', [ProjectController::class, 'GrantValidity'])->name('GrantValidity')->middleware('auth');

Route::post('ExtendGrantValidity', [ProjectController::class, 'ExtendGrantValidity'])->name('ExtendGrantValidity')->middleware('auth');

Route::get('DelGrantDoc/{id}', [ProjectController::class, 'DelGrantDoc'])->name('DelGrantDoc')->middleware('auth');

Route::post('NewGrantDoc', [ProjectController::class, 'NewGrantDoc'])->name('NewGrantDoc')->middleware('auth');

Route::get('GrantDocs/{id}', [ProjectController::class, 'GrantDocs'])->name('GrantDocs')->middleware('auth');

Route::post('GrantSelected', [ProjectController::class, 'GrantSelected'])->name('GrantSelected')->middleware('auth');

Route::get('SelectGrant', [ProjectController::class, 'SelectGrant'])->name('SelectGrant')->middleware('auth');

Route::post('NewGrant', [ProjectController::class, 'NewGrant'])->name('NewGrant')->middleware('auth');

Route::get('ReverseGrant/{id}', [ProjectController::class, 'ReverseGrant'])->name('ReverseGrant')->middleware('auth');

Route::get('GrantDatabase', [ProjectController::class, 'GrantDatabase'])->name('GrantDatabase')->middleware('auth');

Route::get('DelDonor/{id}', [ProjectController::class, 'DelDonor'])->name('DelDonor')->middleware('auth');

Route::post('NewDonor', [ProjectController::class, 'NewDonor'])->name('NewDonor')->middleware('auth');

Route::get('MgtDonors', [ProjectController::class, 'MgtDonors'])->name('MgtDonors')->middleware('auth');
