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
//* profile //
Route::get('profile', 'UserController@profile')->name("profile");
Route::post('profile', 'UserController@update_avatar');
///
Route::get('/panel', 'HomeController@index')->name("main");
Route::view('/', 'landing-page/index')->name("index");
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
    Route::view('/client-register', 'account-management/client-register')->name("client-register");
    Route::view('/user-register', 'account-management/user-register')->name("user-register");
    Route::view('/client-management', 'account-management/client-management')->name("client-management");
    Route::view('/user-management', 'account-management/user-management')->name("user-management");
});

//Route::view('/manage-resource', 'other/building')->name("manage-resource")->middleware('role:admin|manager');
Route::view('/manage-notification', 'other/building')->name("manage-notification")->middleware('role:admin');
Route::group(['prefix' => 'project', 'as'=>'project.', 'middleware' => ['role:admin|manager']], function () {

Route::view('/create', 'projects/create')->name("create");
Route::view('/view', 'projects/view')->name("view");
Route::view('/resources', 'projects/resources')->name("resources");
Route::view('/modify', 'projects/modify')->name("modify");
});

Route::group(['prefix' => 'team', 'as'=>'team.', 'middleware' => ['role:admin|manager']], function () {

    Route::view('/view', 'teams/view')->name("view");
    Route::view('/create', 'teams/create')->name("create");
    Route::view('/modify', 'teams/modify')->name("modify");
    });


    //? api vue ////
Route::group(['prefix' => 'api', 'as'=>'api.'], function () {

Route::resource('/projects', 'ProjectController', [
    'except' => ['edit', 'show', 'store']
  ]);

});
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