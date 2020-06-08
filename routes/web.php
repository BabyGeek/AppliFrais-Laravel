<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/test', 'TestController@index')->name('test');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/user', 'HomeController@index')->name('user');
Route::get('/user/{user_id}', function() {
    return view('dashboard');
})->name('dashboard');
