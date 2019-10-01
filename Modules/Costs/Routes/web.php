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

Route::prefix('user/{user_id}/costs')->name('module-costs.')->group(function() {

    //Routes pour gérer les frais forfaits
    Route::prefix('/package')->group(function() {
        Route::get('/', 'costs\package\CostPackageController@index')->name('package.index')->middleware('auth');
        Route::get('/create', 'costs\package\CostPackageController@create')->name('package.create')->middleware('auth');
        Route::post('/', 'costs\package\CostPackageController@store')->name('package.store')->middleware('auth');
        Route::get('/{id}/edit', 'costs\package\CostPackageController@edit')->where(['id' => '[0-9]+'])->name('package.edit')->middleware('auth');
        Route::delete('/{id}', 'costs\package\CostPackageController@destroy')->where(['id' => '[0-9]+'])->name('package.destroy')->middleware('auth');
    });

    //Routes pour gérer les frais hors forfaits
    Route::prefix('/non-package')->group(function() {
        Route::get('/', 'costs\nonpackage\CostNonPackageController@index')->name('nonpackage.index')->middleware('auth');
        Route::get('/create', 'costs\nonpackage\CostNonPackageController@create')->name('nonpackage.create')->middleware('auth');
        Route::post('/', 'costs\nonpackage\CostNonPackageController@store')->name('nonpackage.store')->middleware('auth');
        Route::get('/{id}', 'costs\nonpackage\CostNonPackageController@show')->where(['id' => '[0-9]+'])->name('nonpackage.show')->middleware('auth');
        Route::get('/{id}/edit', 'costs\nonpackage\CostNonPackageController@edit')->where(['id' => '[0-9]+'])->name('nonpackage.edit')->middleware('auth');
        Route::put('/{id}', 'costs\nonpackage\CostNonPackageController@update')->where(['id' => '[0-9]+'])->name('nonpackage.update')->middleware('auth');
        Route::delete('/{id}', 'costs\nonpackage\CostNonPackageController@destroy')->where(['id' => '[0-9]+'])->name('nonpackage.destroy')->middleware('auth');

        //Routes pour gérer les justificatifs
        Route::prefix('/non-package/{nonpackage_id}/justificate')->group(function() {
            Route::get('/create', 'costs\nonpackage\justificate\CostNonPackageJustificateController@create')->name('nonpackage.justificate.create')->middleware('auth');
            Route::post('/', 'costs\nonpackage\justificate\CostNonPackageJustificateController@store')->name('nonpackage.justificate.store')->middleware('auth');
            Route::delete('/{id}', 'costs\nonpackage\justificate\CostNonPackageJustificateController@destroy')->where(['id' => '[0-9]+'])->name('nonpackage.justificate.destroy')->middleware('auth');
        });
    });

    Route::prefix('/history')->group(function() {
        Route::get('/', 'costs\history\CostsHistoryController@index')->name('history.index')->middleware('auth');
    });
});
