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

        Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
            Route::group(['prefix' => 'passwords'], function () {
                Route::get('/change', 'ChangePasswordController@show')->name('passwords.change.show');
                Route::match(['put', 'patch'], '/change/{id}', 'ChangePasswordController@update')->name('passwords.change.update');
            });
        });

        /*----------  profiles/*  ----------*/
        Route::get('/profiles', 'ProfileController@edit')->name('profiles.edit');
        Route::match(['put', 'patch'], '/profiles/{id}', 'ProfileController@updateGeneral')->name('profiles.update');
        Route::match(['put', 'patch'], '/profiles/avatar/{id}', 'ProfileController@uploadAvatar')->name('profiles.avatar.update');

        /*----------  /timeline  ----------*/
        Route::get('/timeline', 'HomeController@timeline')->name('timeline');

        /*----------  events/*  ----------*/
        Route::resource('/events', 'EventController');
        Route::post('/events/type', 'EventController@storeType')->name('events.type.store');

        /*----------  films/*  ----------*/
        Route::resource('/films', 'FilmController')->except(['show']);
    });
});
