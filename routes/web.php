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
Route::view('/', 'landing-page/index')->name("index");
Route::group(['prefix' => 'panel', 'as'=>''], function () {

Route::Auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//* profile //
Route::get('profile', 'UserController@profile')->name("profile");
Route::post('profile', 'UserController@update_avatar');
///
Route::get('/', 'HomeController@index')->name("main");
Route::get('/minor', 'HomeController@minor')->name("minor")->middleware('role:admin');
Route::group(['prefix' => 'report', 'as'=>'report.', 'middleware' => ['role:admin|manager']], function () {  //middleware(['first', 'second'])->
    Route::group(['prefix' => 'project', 'as'=>'project'], function () {  //middleware(['first', 'second'])->
    Route::get('/', 'ReportController@project');
    Route::get('/{id}', 'ReportController@project_detail');
    }); 
    Route::get('/create', 'ReportController@project_create')->name("team");
});
Route::get('/post', function () {
    return 'Hello World';
});
Route::group(['prefix' => 'manage-account', 'as'=>'manage-account.', 'middleware' => ['role:admin']], function () {  //middleware(['first', 'second'])->
Route::group(['prefix' => 'user', 'as'=>'user.', 'middleware' => ['role:admin']], function () {
Route::get('/', 'UserController@view')->name("view");
Route::get('/view/{id}', 'UserController@view')->name("view");
Route::get('/create', 'UserController@view_create')->name("create");
Route::get('/edit/{id}', 'UserController@view_edit')->name("edit");

    });
    Route::group(['prefix' => 'client', 'as'=>'client.', 'middleware' => ['role:admin']], function () {
        Route::get('/', 'ClientController@view')->name("view");
        Route::get('/view/{id}', 'ClientController@view')->name("view");
        Route::get('/create', 'ClientController@view_create')->name("create");
        Route::get('/edit/{id}', 'ClientController@view_edit')->name("edit");
    });
   
});

Route::view('/manage-notification', 'other/building')->name("manage-notification")->middleware('role:admin');

Route::group(['prefix' => 'project', 'as'=>'project.', 'middleware' => ['role:admin|manager']], function () {
Route::get('/', 'ProjectController@view')->name("view");
Route::get('/view/{id}', 'ProjectController@view')->name("view");
Route::get('/{id}/activity/', 'ProjectController@activity')->name("activity");
Route::get('/create', 'ProjectController@view_create')->name("create");
Route::get('/edit/{id}', 'ProjectController@view_edit')->name("edit");
Route::view('/resources', 'projects/resources')->name("resources");
});

Route::group(['prefix' => 'team', 'as'=>'team.', 'middleware' => ['role:admin|manager']], function () {
    Route::view('/', 'teams/index')->name("view");
    Route::get('/view/{id}', 'TeamController@view')->name("view");
    Route::view('/areas', 'teams/areas')->name("areas");
    });
    //? api vue ////
});
Route::group(['prefix' => 'api', 'as'=>'api.'], function () {
    Route::get('teams/unselected', 'TeamController@unselected');

    Route::apiResources(['projects' => 'ProjectController', 
    'teams' => 'TeamController', 'clients' => 'ClientController',
    'users' => 'UserController', 'wareas' => 'WorkAreaController',
    'activity' => 'ActivityController']);
    });
/*// routes/web.php

});*/