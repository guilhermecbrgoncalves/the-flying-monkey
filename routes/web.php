<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'AirportController@index')->name('home');
    Route::get('/my-airports', 'AirportController@index')->name('my-airports');

    Route::prefix('logbook')->group(function () {
        Route::get('', 'LogbookController@index')->name('my-logbook');
        Route::post('', 'LogbookController@store')->name('logbook-store');
        Route::put('{logbook}', 'LogbookController@update')->name('logbook-update');
        Route::delete('{logbook}', 'LogbookController@destroy')->name('logbook-delete');
    });

    Route::prefix('airports')->group(function () {
        Route::get('', 'AirportController@index')->name('my-airports');
        Route::post('', 'AirportController@store')->name('my-airports-store');
        Route::put('{airport}', 'AirportController@update')->name('my-airports-update');
        Route::delete('{airport}', 'AirportController@destroy')->name('my-airports-delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@index');
        Route::post('', 'UserController@store')->name('user-store');
        Route::get('{user}', 'UserController@show');
        Route::get('{user}/edit', 'UserController@edit');
        Route::put('{user}', 'UserController@update')->name('user-update');;
        Route::delete('{user}', 'UserController@destroy')->name('user-delete');
    });
});
