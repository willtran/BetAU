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
			// Redirect to the previous access link, otherwise redirect to the admin dashboard home pagw
			$sRedirectUrl = Session::get('redirect_url','admin/index');
			Session::forget('redirect_url');
			return Redirect::to($sRedirectUrl)
				->with('flash_notice','You are successfuly logged in.');
		}
		else 
		{
			// Redirect back to login form
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
		$aUsers = User::all();
		return View::make('user.manage')->with('users', $aUsers);
	}
	
	public function create()
	{
		// Get user posted data
		$aUserData = array(
			'email'				=> Input::get('email'),
			'username' 			=> Input::get('username'),
			'password' 			=> Input::get('password'),
			'confirm_password' 	=> Input::get('confirm_password'),
			'level_id'			=> Input::get('level_id')
		);
		
		// var_dump($aUserData);die;
		// Define validation rules
		$aRules = array(
			'email'	=> 'required|email|unique:users,email',
			'username'	=>	'required|alpha_dash|unique:users,username',
			'password'	=>	'required|min:6',
			'confirm_password'	=>	'required|same:password',
			'level_id'			=> 'required'
		);
		
		// Process validation checking, redirect to create form if the validation was failed,
		// otherwise create a new user, 
		$oValidation = Validator::make($aUserData, $aRules);
		
		if($oValidation->fails())
		{
			return Redirect::route('user-create')->withErrors($oValidation)->withInput();
		}
		
		$aUserData['password'] = Hash::make($aUserData['password']);
		$oUser = new User($aUserData);
		$oUser->save();
		
		return Redirect::route('user-manage')->with('flash_notice', 'User <strong>'.$aUserData['username'].'</strong> had been created.');;
	}

	public function edit()
	{
		
	}
}
?>
