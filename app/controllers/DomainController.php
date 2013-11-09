<?php

class DomainController extends \BaseController {

	/**
	 * Constructor to check the authorization before processing an action
	 */
	public function __construct()
	{
		// $this->filter('before', 'auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oDomain = Domain::paginate(27);
		return View::make('domain.index')->with('domains', $oDomain)
			->with('menu', array('main' => 'domain', 'side_bar' => 'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('domain.create')->with('menu',array('main'=>'domain','side_bar'=>'create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Get domain posted data
		$aDomainData = Input::all();
		$aDomainData['owner_id'] = Auth::user()->id;
						
		// Define validation rules
		$aRules = array(
			'name' 			=> 'required|unique:domains,name',
			'analytic_id'	=> 'alpha_dash',
			'title'			=> 'required'
		);
		
		// Process validation checking, redirect to create form if the validation was failed,
		// otherwise create a new domain
		
		$oValidation = Validator::make($aDomainData, $aRules);
		
		if($oValidation->fails())
		{
			return Redirect::route('admin.domain.create')->withErrors($oValidation)->withInput();
		}
		
		$oDomain = new Domain($aDomainData);
		$oDomain->save();
		
		return Redirect::route('admin.domain.index')->with('flash_notice', 'Domain <strong>'.$aDomainData['name'].'</strong> had been created.');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oDomain = Domain::find($id);
			
		if(!$oDomain)
		{
			return Redirect::route('admin.domain.index')->with('flash_error', 'Selected domain not found!');
		}
		else 
		{
			return View::make('domain.edit')->with('domain', $oDomain)
					->with('menu', array('main'=>'domain', 'side_bar'=>'index'));
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
		$oDomain = Domain::find($id);
		if(!$oDomain)
		{
			return Redirect::route('admin.domain.index')
					->with('flash_error', 'Selected domain not found!')
					->withInput();
		}

		// Get post data
		$aDomainData = Input::all();
		
		// Define validation rules
		$aRules = array(
			'name' 			=> 'required',
			'analytic_id'	=> 'alpha_dash',
			'title'			=> 'required'
		);
		
		if($aDomainData['name'] != $oDomain->name)
		{
			$aRules['name'] =  'required|unique:domains,name';
		}
		
		// Process validation checking, redirect to edit form if the validation was failed,
		// otherwise update the selected user, 
		$oValidation = Validator::make($aDomainData, $aRules);
		if($oValidation->fails())
		{
			return Redirect::route('admin.domain.edit', array('domain' => $oDomain->id))->withErrors($oValidation);
		}
		
		// Process update user information
		$oDomain->name = $aDomainData['name'];
		$oDomain->analytic_id = $aDomainData['analytic_id'];
		$oDomain->is_active = $aDomainData['is_active'];
		$oDomain->category_id = $aDomainData['category_id'];
		$oDomain->template_id = $aDomainData['template_id'];
		$oDomain->heading = $aDomainData['heading'];
		$oDomain->title = $aDomainData['title'];
		$oDomain->keyword = $aDomainData['keyword'];
		$oDomain->description = $aDomainData['description'];
		$oDomain->save();
		
		return Redirect::route('admin.domain.index')->with('flash_notice', 'Domain <strong>'.$oDomain->name.'</strong> had been successfully updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}