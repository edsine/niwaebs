<?php

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

use Modules\Procurement\Http\Controllers\ProcurementController;

Route::resource('procurement', ProcurementController::class);
Route::prefix('procurements')->group(function () {
    Route::get('/supervisor', 'ProcurementController@supervisor')->name('unit.proc');
    Route::get('/departmental', 'ProcurementController@hodprocurement')->name('hod.proc');
    Route::get('/legal', 'ProcurementController@hodprocurement')->name('legal.proc');

    Route::get('/legal/{id}','ProcurementController@legaledit')->name('legal.edit');
    Route::get('/departmental/{id}','ProcurementController@hodedit')->name('hod.edit');
    Route::get('{id}', 'ProcurementController@unitedit')->name('unithead');
});
