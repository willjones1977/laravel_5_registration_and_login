<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Welcome Screen
	Route::get('/', function () {
	    return view('welcome');
	});
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Authentication Routes...
	Route::get('auth/login', 	'Auth\AuthController@getLogin');
	Route::post('auth/login', 	'Auth\AuthController@postLogin');
	Route::get('auth/logout', 	'Auth\AuthController@getLogout');

	// Registration routes...
	Route::get('auth/register', 	'Auth\AuthController@getRegister');
	Route::post('auth/register', 	'Auth\AuthController@postRegister');
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Protected Routes here
	Route::group(['middleware' => 'auth'], function() {
		Route::get('home', function(){
			return view('home');
		});
		// Protect Project Routes
			Route::get('showProjects', 	 				'ProjectsController@showAllUserProjects');
			Route::get('showAddProject', 				'ProjectsController@showAddProject');
			Route::post('addProject', 	 				'ProjectsController@addProject');
			Route::get('showProjectSummary/{routeid}', 	'ProjectsController@showProjectSummary');
			Route::post('saveProjectTask', 				'TasksController@addTask');
			// Load users assigned and not assigned to a task
			Route::post('getUsersAssignedAndNotAssigned', 'TasksController@getUsersAssignedAndNotAssigned');
			// Set the users assigned to a task
			Route::post('setUsersAssignedAndNotAssigned', 'TasksController@setUsersAssignedAndNotAssigned');
			// showProjectSummary
		// Protected Tasks Routes
			Route::get('todo', 				'TasksController@showAllUncompletedTasksAssignedToUser');
			Route::get('showAddTask', 		'TasksController@showAddTask');
			Route::post('addTask', 			'TasksController@addTask');
			Route::post('markTaskComplete', 'TasksController@markTaskComplete' );
	});
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

