<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class UserController extends BaseController
{
	/**
	 * Login Action
	 */
	public function login()
	{
		// Get post data
		$aUser = array(
				'username' 	=> Input::get('username'),
				'password'	=> Input::get('password')
		);
		
		// Process authorization checking
		if(Auth::attempt($aUser))
		{
			return Redirect::route('admin-index')
				->with('flash_notice','You are successfuly logged in.');
		}
		else 
		{
			return Redirect::route('login')
				->with('flash_error','Invalid username/password!')
				->withInput();
		}
	}
	
	/**
	 *  Logout Action
	 */
	public function logout()
	{
		Auth::logout();
		
		return Redirect::route('admin-home')
        	->with('flash_notice', 'You are successfully logged out.');
	}
	
	public function manage()
	{
		
	}
	
	public function create()
	{
		
	}
}
?>
