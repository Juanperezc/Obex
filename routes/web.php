<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::Auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name("main");
Route::get('/minor', 'HomeController@minor')->name("minor")->middleware('role:admin');
Route::group(['prefix' => 'report', 'as'=>'report.', 'middleware' => ['role:admin|manager']], function () {  //middleware(['first', 'second'])->
    Route::group(['prefix' => 'project', 'as'=>'project'], function () {  //middleware(['first', 'second'])->
    Route::get('/', 'ReportController@project');
    Route::get('/{id}', 'ReportController@project_detail');
    }); 
    Route::get('/team', 'ReportController@team')->name("team");
});
Route::get('/post', function () {
    return 'Hello World';
});
Route::group(['prefix' => 'manage-account', 'as'=>'manage-account.', 'middleware' => ['role:admin']], function () {  //middleware(['first', 'second'])->
    Route::view('/client', 'other/building')->name("client");
    Route::view('/user', 'other/building')->name("user");
});

Route::view('/manage-resource', 'other/building')->name("manage-resource")->middleware('role:admin|manager');
Route::view('/manage-notification', 'other/building')->name("manage-notification")->middleware('role:admin');

/*// routes/web.php
Route::group(['prefix' => 'books'], function () {
// First Route
Route::get('/first', function () {
return 'The Colour of Magic';
});
// Second Route
Route::get('/second', function () {
return 'Reaper Man';
});

// Third Route
Route::get('/third', function () {
return 'Lords and Ladies';
});

});*/