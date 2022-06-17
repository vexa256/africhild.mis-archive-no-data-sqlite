<?php

use App\Http\Controllers\TrackingController;

Route::middleware(['auth'])->group(function () {

    Route::controller(TrackingController::class)->group(function () {

        Route::get('CreateMyCategories', 'CreateMyCategories')->name('CreateMyCategories');

        Route::get('CreateMyActivities', 'CreateMyActivities')->name('CreateMyActivities');

        Route::get('SuperVisorAction', 'SuperVisorAction')->name('SuperVisorAction');

        Route::get('SelectTracker', 'SelectTracker')->name('SelectTracker');

        Route::post('StaffSelected', 'StaffSelected')->name('StaffSelected');

        Route::get('TrackStaffActivities/{id}', 'TrackStaffActivities')->name('TrackStaffActivities');

    });
});