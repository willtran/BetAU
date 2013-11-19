<?php

class LayoutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oLayout = Layout::all();
		return View::make('layout.index')->with('layouts', $oLayout)
			->with('menu', array('main' => 'layout', 'side_bar' => 'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('layout.create')
			->with('menu', array('main'=>'layout', 'side_bar'=>'create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$aLayoutData = Input::all();
		$aLayoutData['name'] = str_replace(array("!","@","#","$","%","^","&","*","+","/"),"", $aLayoutData['name']);
		
		// Define validation rules
		$aRules = array(
			'name' 						=> 'required|unique:layouts,name',
			'header_background'			=> 'mimes:png',
			'header_text_color'			=> 'alpha_num|min:6|max:6',
			'header_hover_color'		=> 'alpha_num|min:6|max:6',
			'footer_background'			=> 'mimes:png',
			'footer_text_color'			=> 'alpha_num|min:6|max:6',
			'footer_hover_color'		=> 'alpha_num|min:6|max:6',
			'bookmarker_background'		=> 'mimes:png',
			'bookmarker_text_color'		=> 'alpha_num|min:6|max:6',
			'article_background'		=> 'mimes:png',
			'article_title_color'		=> 'alpha_num|min:6|max:6',
			'article_title_hover_color'	=> 'alpha_num|min:6|max:6',
			'article_description_color'	=> 'alpha_num|min:6|max:6',
		);
		
		// Process validation checking, redirect to create form if the validation was failed,
		// otherwise create a new domain
		$oValidation = Validator::make($aLayoutData, $aRules);
		
		if($oValidation->fails())
		{
			return Redirect::route('admin.layout.create')->withErrors($oValidation)->withInput();
		}
		$aLayoutData['label'] = strtolower(str_replace(array("-", " "),"_", $aLayoutData['name']));
		$oLayout = new Layout($aLayoutData);
		$oLayout->save();
		
		/** Process add new template css and image **/
		$oLayout->createLayoutFiles($aLayoutData);
		
		return Redirect::route('admin.layout.index')->with('flash_notice', 'Layout <strong>'.$aLayoutData['name'].'</strong> had been added.');;
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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