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
    return 'Hello';
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/images/avatars/{id}/{file_name}', 'ImageController@showAvatar')->name('images.avatar');
