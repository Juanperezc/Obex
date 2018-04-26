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
Route::get('/minor', 'HomeController@minor')->name("minor");
Route::group(['prefix' => 'report', 'as'=>'report.'], function () {  //middleware(['first', 'second'])->
    Route::get('/project', 'ReportController@project')->name("project");
    Route::get('/team', 'ReportController@team')->name("team");
});
Route::get('/post', function () {
    return 'Hello World';
});
Route::group(['prefix' => 'manage-account', 'as'=>'manage-account.'], function () {  //middleware(['first', 'second'])->
    Route::view('/client', 'other/building')->name("client");
    Route::view('/user', 'other/building')->name("user");
});

Route::view('/manage-resource', 'other/building')->name("manage-resource");
Route::view('/manage-notification', 'other/building')->name("manage-notification");
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