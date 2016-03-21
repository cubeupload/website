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

Route::get('/about', 'PageController@getAbout');
Route::get('/faq', 'PageController@getFaq');
Route::get('/contact', 'PageController@getContact');
Route::get('/terms', 'PageController@getTerms');
Route::get('/help', 'PageController@getHelp');

Route::controllers([
	'/auth' => 'Auth\AuthController',
	'/password' => 'Auth\PasswordController',
	'/upload' => 'UploadController',
	'/images' => 'ImagesController',
	'/settings' => 'SettingsController',
	'/account' => 'AccountController',
	'/ajax/validate' => 'Ajax\ValidateController',
	'/ajax/image' => 'Ajax\ImageController',
	'/ajax/util' => 'Ajax\UtilController',
	'/ajax/messages' => 'Ajax\MessagesController'
]);

Route::group(['middleware' => ['auth', 'cubeadmincheck', 'cubeadminunreadmessages']], function()
{
	Route::get('/admin', 'Admin\HomeController@getIndex');

	Route::controllers([
		'/admin/users' => 'Admin\UsersController',
		'/admin/messages' => 'Admin\MessagesController',
		'/admin/notices' => 'Admin\NoticesController',
		'/admin/images' => 'Admin\ImagesController',
		'/admin/search' => 'Admin\SearchController',
		'/admin/tools' => 'Admin\ToolsController'
	]);
});

