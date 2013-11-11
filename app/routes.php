<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
 * 	Log-in route handlers
 */
Route::get('admin/login', array('as' => 'login', function (){
	return View::make('user.login');
}))->before('guest');

Route::post('admin/login', 'UserController@login');

Route::get('admin/logout', array(
	'as' => 'logout', 
	'uses' =>'UserController@logout'));
	
/* 
 * Domain management route handlers
 */
Route::group(array('prefix'=>'admin','before'=>'auth'), function ()
{	
	Route::get('/index', array('as'=>'admin.index','uses' => 'AdminController@index'))->before('auth');
	Route::get('/', 'AdminController@index')->before('auth');
	/**
	 * Route handler for users
	 */
	Route::resource('user', 'UserController');
	/**
	 * Route handler for domains
	 */
	Route::resource('domain', 'DomainController');
});

/**
 * Return 404 error when no route is matched
 */
App::missing(function($exception){
    return '<strong><font style="font-size: 26pt;">404: Page Not Found </font></strong>';
});