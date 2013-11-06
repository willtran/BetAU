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

//	Log-in route handlers
Route::get('admin/login', array('as' => 'login', function (){
	return View::make('user.login');
}))->before('guest');

Route::post('admin/login', 'UserController@login');

Route::get('admin/logout', array('as' => 'logout', 'uses' =>'UserController@logout'));

// Admin route handlers
Route::get('/admin', 'AdminController@index')->before('auth');

Route::get('admin/home', array('as' => 'admin-home', 'uses' => 'AdminController@home'))->before('guest');

Route::get('admin/index', array('as' => 'admin-index', 'uses' => 'AdminController@index'))->before('auth');

// User management route handlers
Route::get('admin/user/manage', array('as' => 'user-manage', 'uses' => 'UserController@manage'))->before('auth');

Route::get('admin/user/create', array('as' => 'user-create', function(){
	return View::make('user.create');
}))->before('auth');

Route::post('admin/user/create', 'UserController@create')->before('auth');

Route::get('admin/user/edit', function(){
	$iUserId = (int) Input::get('id');
	
	if(!$iUserId)
	{
		return View::make('user.edit')->with('flash_error', 'Related user not found!');
	}
	else
	{
		$aUser = User::find($iUserId);
		if(!$aUer)
		{
			return View::make('user.edit')->with('flash_error', 'Related user not found!');
		}
		else 
		{
			return View::make('user.edit')->with('flash_error', 'Related user not found!');
		}
	}
})->before('auth');
