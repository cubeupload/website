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

Route::get('/', 'HomeController@getIndex');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'upload' => 'UploadController',
	'images' => 'ImagesController',
	'settings' => 'SettingsController',
	'account' => 'AccountController',
	'ajax/validate' => 'Ajax\ValidateController',
	'ajax/image' => 'Ajax\ImageController',
	'ajax/util' => 'Ajax\UtilController'
]);

//Route::get('/admin', 'Admin\HomeController@getIndex');

Route::controllers([
	//'/admin' => 'Admin\HomeController',
	'/admin/users' => 'Admin\UsersController'
]);