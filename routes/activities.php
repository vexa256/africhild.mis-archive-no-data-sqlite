<?php

use App\Http\Controllers\ActivityAnalytics;

Route::middleware(['auth'])->group(function () {

    Route::controller(ActivityAnalytics::class)->group(function () {

        Route::get('SelectActivities', 'SelectActivities')->name('SelectActivities');

    });
});