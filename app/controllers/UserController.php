<?php

class UserController extends \BaseController {

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
			$sRedirectUrl = Session::get('redirect_url', 'admin/index');
			Session::forget('redirect_url');
			return Redirect::to($sRedirectUrl)
				->with('flash_notice', 'You are successfuly logged in.');
		}
		else 
		{
			// Redirect back to login form
			return Redirect::route('login')
				->with('flash_error_login','Invalid username/password!')
				->withInput();
		}
	}
	
	/**
	 *  Logout Action
	 */
	public function logout()
	{
		Auth::logout();
		
		return Redirect::route('login')
        	->with('flash_notice_login', 'You are successfully logged out.');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oUsers = User::all();
		return View::make('user.index')->with('users', $oUsers)
				->with('menu', array('main'=>'user','side_bar'=>'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create')
		->with('menu', array('main'=>'user','side_bar'=>'create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Get user posted data
        $aUserData = Input::all();                

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
			return Redirect::route('admin.user.create')->withErrors($oValidation)->withInput();
		}
		
		$aUserData['password'] = Hash::make($aUserData['password']);
		$oUser = new User($aUserData);
		$oUser->save();
		
		return Redirect::route('admin.user.index')->with('flash_notice', 'User <strong>'.$aUserData['username'].'</strong> had been created.');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oUser = User::find($id);
		
		if(!$oUser)
		{
			return Redirect::route('admin.user.index')->with('flash_error', 'Related user not found!');
		}
		else 
		{
			return View::make('user.edit')->with('user', $oUser)
					->with('menu', array('main'=>'user','side_bar'=>'index'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Get selected user
		$oUser = User::find($id);
		if(!$oUser)
		{
			return Redirect::route('admin.user.index')
					->with('flash_error', 'Selected user not found!')
					->withInput();
		}

		// Get post data
		$aUserData = Input::all();
		
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
			return Redirect::route('admin.user.edit', array('user'=>$oUser->id))->withErrors($oValidation);
		}
		
		// Process update user information
		$oUser->email    = $aUserData['email'];
		$oUser->username = $aUserData['username'];
		$oUser->level_id = $aUserData['level_id'];
		$oUser->save();
		
		return Redirect::route('admin.user.index')->with('flash_notice', 'User <strong>'.$oUser->username.'</strong> had been successfully updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Get selected user
		$oUser = User::find($id);
		if(!$oUser)
		{
			return Redirect::route('admin.user.index')
					->with('flash_error', 'Selected user not found!')
					->withInput();
		}
		
		// Process delete user
		$oUser->delete();
		
		return 'The user <strong>'.$oUser->username.'</strong> had been successfully deleted!';
	}
}