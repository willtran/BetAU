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

/** Front-End route handlers**/
Route::get('/', array('as'=> 'index', 'uses' => 'IndexController@index'));
Route::get('/{article}.html', array('as' => 'article', 'uses'=>'IndexController@article'));

;/*
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
Route::group(array('prefix'=>'admin','domain' => Config::get('app.host'), 'before'=>'auth'), function ()
{	
	Route::get('/', array('as'=>'admin.index','uses' => 'AdminController@index'));
	 /**
	  *  Route handler for users
	  */
	Route::resource('user', 'UserController');
	
	Route::get('user/{user}/settings', array('as'=>'admin.user.settings', 'uses'=>'UserController@setting'));
	
	Route::get('user/{user}/pasword', array('as'=>'admin.user.password', 'uses'=>'UserController@password'));
	
	/**
	 * Route handler for domains
	 */
	Route::resource('domain', 'DomainController');
	/**
	 * Route handler for category
	 */
	Route::resource('category', 'CategoryController');
	/**
	 * Route handler for layout
	 */
	Route::resource('layout', 'LayoutController');
	/**
	 * Route handler for article
	 */
	Route::resource('article', 'ArticleController');
});

/**
 * Return 404 error when no route is matched
 */
App::missing(function($exception){
    return '<strong><font style="font-size: 26pt;">404: Page Not Found </font></strong>';
});