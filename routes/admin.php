<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', 'LoginController@showLoginForm')->name('showLogin');
        Route::post('/login', 'LoginController@login')->name('login');
        Route::get('/logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        /*----------  admin/  ----------*/
        Route::get('/', 'HomeController@index')->name('index');

        /*----------  events/*  ----------*/
        Route::resource('/events', 'EventController');
    });
});
