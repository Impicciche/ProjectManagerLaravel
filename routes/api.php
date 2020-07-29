<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => ['jwt.auth'],

], function ($router) {
    Route::resource('project', "ProjectController");
    Route::resource('client', "ClientController");
    Route::resource('task', "TaskController");
    Route::resource('message', "MessageController");
    Route::resource('contact', "ContactController");
    Route::get('user/tasks', "UserController@tasks");
    Route::get('user/tasks/created', "UserController@createdTasks");
    Route::get('user/roles', "UserController@roles");
    Route::get('role/{role}/users', "RoleController@users");
    Route::get('user/messages', "UserController@messages");
    Route::get('user/createdProjects', "UserController@projects");
    Route::get('task/{task}/users', "TaskController@users");
    // Route::get('task/{task}/user/creator', "TaskController@userCreator");
    // Route::get('task/{task}/project', "TaskController@project");
    // Route::get('project/{project}/client', "ProjectController@client");
    Route::get('project/{project}/tasks', "ProjectController@tasks");
    Route::get('project/{project}/messages', "ProjectController@messages");
    Route::get('project/{project}/messages', "ProjectController@user");
    // Route::get('user/tasks/created', "UserController@createdTasks");

});


Route::group([

    'middleware' => ['api'],
    'prefix' => 'auth'

], function ($router) {

    // Route::resource('task', "TaskController");
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
