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

/**
 *  Route resource definition
 */
// Route::resource('admin','AdminController'));
// Route::resource('user','UserController');

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
 * Admin route handlers
 */
Route::get('/admin', 'AdminController@index')->before('auth');

Route::get('admin/home', array(
	'as' => 'admin-home',
	'uses' => 'AdminController@home'))
->before('guest');

Route::get('admin/index', array(
	'as' => 'admin-index',
	'uses' => 'AdminController@index'))
->before('auth');

/*
 * User management route handlers 
 */
Route::get('admin/user/manage', array(
	'as' => 'user-manage', 
	'uses' => 'UserController@manage'))
->before('auth');

Route::get('admin/user/create', array('as' => 'user-create', function(){
	return View::make('user.create')->with('menu', array('main'=>'user','side_bar'=>'create'));;
}))->before('auth');

Route::post('admin/user/create', 'UserController@create')->before('auth');

Route::get('admin/user/edit', array('as' => 'user-edit', function(){
	$iUserId = (int) Input::get('id');
	$oUser = User::find($iUserId);
		
	if(!$oUser)
	{
		return Redirect::route('user-manage')->with('flash_error', 'Related user not found!');
	}
	else 
	{
		return View::make('user.edit')->with('user', $oUser)
				->with('menu', array('main'=>'user','side_bar'=>'manage'));
	}
}))->before('auth');

Route::post('admin/user/edit', 'UserController@edit')->before('auth');

Route::get('admin/user/delete', array('as' => 'user-delete', 'uses' => 'UserController@delete'))
->before('auth');

/* 
 * Domain management route handlers
 */
Route::group(array('prefix'=>'admin','before'=>'auth'), function (){
	Route::resource('domain', 'DomainController');
});