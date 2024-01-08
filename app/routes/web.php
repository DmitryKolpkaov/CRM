<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'auth'], function (){
   Route::get('/login', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
   Route::post('/login', 'App\Http\Controllers\Auth\LoginController@store')->name('login.store');
   Route::get('/register', 'App\Http\Controllers\Auth\RegistrationController@index')->name('register');
   Route::post('/register', 'App\Http\Controllers\Auth\RegistrationController@store')->name('register.store');
   Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->middleware('check.auth')->name('logout');
});

Route::group(['middleware' => 'check.auth'], function (){
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
});
