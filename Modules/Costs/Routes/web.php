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

Route::prefix('/costs')->name('module-costs.')->group(function() {

    //Routes pour gérer les frais forfaits
    Route::prefix('/{user_id}/package')->group(function() {
        Route::get('/', 'costs\package\CostPackageController@index')->name('package.index');
        Route::get('/create', 'costs\package\CostPackageController@create')->name('package.create');
        Route::post('/', 'costs\package\CostPackageController@store')->name('package.store');
        Route::get('/{id}', 'costs\package\CostPackageController@show')->where(['id' => '[0-9]+'])->name('package.show');
        Route::get('/{id}/edit', 'costs\package\CostPackageController@edit')->where(['id' => '[0-9]+'])->name('package.edit');
        Route::put('/{id}', 'costs\package\CostPackageController@update')->where(['id' => '[0-9]+'])->name('package.update');
        Route::delete('/{id}', 'costs\package\CostPackageController@destroy')->where(['id' => '[0-9]+'])->name('package.destroy');
    });

    //Routes pour gérer les frais hors forfaits
    Route::prefix('/{user_id}/non-package')->group(function() {
        Route::get('/', 'costs\nonpackage\CostNonPackageController@index')->name('nonpackage.index');
        Route::get('/create', 'costs\nonpackage\CostNonPackageController@create')->name('nonpackage.create');
        Route::post('/', 'costs\nonpackage\CostNonPackageController@store')->name('nonpackage.store');
        Route::get('/{id}', 'costs\nonpackage\CostNonPackageController@show')->where(['id' => '[0-9]+'])->name('nonpackage.show');
        Route::get('/{id}/edit', 'costs\nonpackage\CostNonPackageController@edit')->where(['id' => '[0-9]+'])->name('nonpackage.edit');
        Route::put('/{id}', 'costs\nonpackage\CostNonPackageController@update')->where(['id' => '[0-9]+'])->name('nonpackage.update');
        Route::delete('/{id}', 'costs\nonpackage\CostNonPackageController@destroy')->where(['id' => '[0-9]+'])->name('nonpackage.destroy');
    });
});
