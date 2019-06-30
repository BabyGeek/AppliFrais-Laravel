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

Route::get('/test', function(){
    require_once '/path/to/Faker/src/autoload.php';
    // alternatively, use another PSR-4 compliant autoloader

    // use the factory to create a Faker\Generator instance
    $faker = Faker\Factory::create();

    // generate data by accessing properties
    echo $faker->name;
    // 'Lucy Cechtelar';
    echo $faker->address;
    // "426 Jordy Lodge
    // Cartwrightshire, SC 88120-6700"
    echo $faker->text;
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('login');
});

Route::get('/user', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/user/{user_id}', 'HomeController@index')->name('user');
