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
    return view('welcome');
});
Route::get('/about/{fName}/{mName}/{lName}', 'homeController@about');
Route::get('/name/{firstName}/{middleName}/{lastName}', 'homeController@myname');

Route::group(['prefix' => 'account'], function(){
    Route::get('/login', function(){
        return "login";
    });
    Route::get('/profile', function(){
        return "profile";
    });
    Route::get('/update', function(){
        return "update";
    });
    Route::get('/logout', function(){
        return "logout";
    });
});
Route::get('/singleroute', 'singleController@singleRoute');
Route::resource('/admin', 'postController');
Route::get('/home', 'homeController@myHome');
