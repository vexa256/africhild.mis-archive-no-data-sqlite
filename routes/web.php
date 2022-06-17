<?php

use App\Http\Controllers\MainHumanResource;
use App\Http\Controllers\UpdateLogic;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/offline', function () {
    return view('home.index');
});

/**Route::get('/', function () {
return view('home.index');
});*/

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [MainHumanResource::class, 'MgtEmp'])->name('dashboard');

    Route::post('/UpdateLogic', [UpdateLogic::class, 'UpdateLogic'])->name('UpdateLogic');

    Route::post('/NewRecord', [UpdateLogic::class, 'NewRecord'])->name('NewRecord');

    Route::post('/CMSUpdate', [UpdateLogic::class, 'CMSUpdate'])->name('CMSUpdate');

    Route::get('/MassDelete/{id}/{TableName}', [UpdateLogic::class, 'MassDelete'])->name('MassDelete');

    Route::get('/', [MainHumanResource::class, 'AccountRouter']);

});

require __DIR__ . '/hr.php';
require __DIR__ . '/activities.php';
require __DIR__ . '/proj.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/inv.php';
require __DIR__ . '/act.php';