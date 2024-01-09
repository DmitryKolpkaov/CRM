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

    Route::group(['prefix'=>'tasks'], function(){
        Route::get('your/tasks', 'App\Http\Controllers\Tasks\TaskController@index')->name('user.tasks');
        Route::get('your/task/create', 'App\Http\Controllers\Tasks\TaskController@create')->name('user.tasks.create');
        Route::get('your/task/{task}', 'App\Http\Controllers\Tasks\TaskController@show')->name('user.tasks.show');
        Route::post('your/task/store', 'App\Http\Controllers\Tasks\TaskController@store')->name('user.tasks.store');
        Route::put('your/task/restore/{task}', 'App\Http\Controllers\Tasks\TaskController@restore')->name('user.tasks.restore');
        Route::get('your/task/edit/{task}', 'App\Http\Controllers\Tasks\TaskController@edit')->name('user.tasks.edit');
        Route::put('your/task/update/{task}', 'App\Http\Controllers\Tasks\TaskController@update')->name('user.tasks.update');
        Route::delete('your/task/destroy{task}', 'App\Http\Controllers\Tasks\TaskController@destroy')->name('user.tasks.destroy');
    });
});
