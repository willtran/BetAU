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
	
	/**
	 * User Manage Action
	 */
	public function manage()
	{
		$aUsers = User::all();
		return View::make('user.manage')->with('users', $aUsers);
	}
	
	/**
	 * User Create Action
	 */
	public function create()
	{
		// Get user posted data
                $aUserData = array(
                        'email'           	=> Input::get('email'),
                        'username'        	=> Input::get('username'),
                        'password'      	=> Input::get('password'),
                        'confirm_password' 	=> Input::get('confirm_password'),
                        'level_id'			=> Input::get('level_id')
                );
                
                // var_dump($aUserData);die;
                // Define validation rules
                $aRules = array(
                        'email'        		=> 'required|email|unique:users,email',
                        'username'        	=> 'required|alpha_dash|unique:users,username',
                        'password'        	=> 'required|min:6',
                        'confirm_password'  => 'required|same:password',
                        'level_id'          => 'required'
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

	/**
	 * User Edit Action
	 */
	public function edit()
	{
		// Get selected user
		$iUserId = Input::get('user_id');
		$oUser = User::find($iUserId);
		if(!$oUser)
		{
			return View::make('user.manage')
					->with('flash_error', 'Related user not found!')
					->withInput();
		}

		// Get post data
		$aUserData = array(
			'email'				=> Input::get('email'),
			'username' 			=> Input::get('username'),
			'level_id'			=> Input::get('level_id')
		);
		
		// Define validation rules
		$aRules = array(
			'level_id'	=> 'required'
		);
		if($aUserData['email'] != $oUser->email)
		{
			$aRules['email'] =  'required|email|unique:users,email';
		}
		if($aUserData['username'] != $oUser->username)
		{
			$aRules['username'] =  'required|alpha_dash|unique:users,username';
		}
		
		// Process validation checking, redirect to edit form if the validation was failed,
		// otherwise update the selected user, 
		$oValidation = Validator::make($aUserData, $aRules);
		if($oValidation->fails())
		{
			return Redirect::route('user-edit', array('id'=>$oUser->id))->withErrors($oValidation);
		}
		
		// Process update user information
		$oUser->email    = $aUserData['email'];
		$oUser->username = $aUserData['username'];
		$oUser->level_id = $aUserData['level_id'];
		$oUser->save();
		
		return Redirect::route('user-manage')->with('flash_notice', 'User <strong>'.$oUser->username.'</strong> had been successfully updated.');
	}

	/**
	 * User Delete Action
	 */
	public function delete()
	{
		// Get selected user
		$iUserId = Input::get('user_id');
		$oUser = User::find($iUserId);
		if(!$oUser)
		{
			return View::make('user.manage')
					->with('flash_error', 'Related user not found!')
					->withInput();
		}
		
		// Process delete user
		$oUser->delete();
		return 'The user <strong>'.$oUser->username.'</strong> had been successfully deleted!';
	}
}
?>
