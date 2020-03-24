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
Route::prefix('user/{user_id}/accounting')->name('module-accounting.')->group(function() {

    //Routes pour permettre au comptable de gérer les visiteurs
    Route::prefix('/history')->group(function() {
        Route::get('/', 'AccountingController@index')->name('history.index')->middleware('auth');
    });
    
    //Route pour accéder a l'utilisateur et le gérer
    Route::prefix('/profile')->group(function() {
        Route::get('/{profile_id}', 'AccountingUserController@index')->where(['profile_id' => '[0-9]+'])->name('user.detail');
    });
});
