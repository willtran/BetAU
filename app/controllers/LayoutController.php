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
		$oLayout = Layout::find($id);
		
		if(!$oLayout)
		{
			return Redirect::route('admin.layout.index')->with('flash_error', 'Selected layout not found!');
		}
		else 
		{
			// Generate layout storage path
			$sLayoutPath = public_path() . "/layout/{$id}/css/" ;
			$oLayout->header_css = @file_get_contents($sLayoutPath."header.css");
			$oLayout->footer_css = @file_get_contents($sLayoutPath."footer.css");
			$oLayout->home_css = @file_get_contents($sLayoutPath."home.css");
			return View::make('layout.edit')
					->with('layout', $oLayout)
					->with('layout_type', 'header')
					->with('menu', array('main'=>'layout', 'side_bar'=>'index'));
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
		// Get selected layout
		$oLayout = Layout::find($id);
		if(!$oLayout)
		{
			return Redirect::route('admin.layout.index')
					->with('flash_error', 'Selected layout not found!')
					->withInput();
		}
		
		// Get post data
		$aLayoutData = Input::all();
		
		// Define validation rules
		$aRules = array(
			'name' 	=> 'required',
			'header_background'		=> 'mimes:png',
			'footer_background'		=> 'mimes:png',
			'bookmarker_background'	=> 'mimes:png',
			'article_background'	=> 'mimes:png',
			'header_css'			=> 'required',
		);
		
		if($aLayoutData['name'] != $oLayout->name)
		{
			$aRules['name'] =  'required|unique:layouts,name';
		}
		
		// Process validation checking, redirect to edit form if the validation was failed,
		// otherwise update the selected user, 
		$oValidation = Validator::make($aLayoutData, $aRules);
		if($oValidation->fails())
		{
			return Redirect::route('admin.layout.edit', array('layout' => $oLayout->id))
			->with('layout', $oLayout)
			->with('layout_type', $aLayoutData['layout_type'])
			->withErrors($oValidation);
		}
		
		// Process update layout information
		$oLayout->name = $aLayoutData['name'];
		$oLayout->save();
		
		// Update image and css layout
		$sImagePath = public_path() . "/layout/{$id}/images";
		$sCSSPath 	= public_path() . "/layout/{$id}/css";
		switch($aLayoutData['layout_type'])
		{
			case 'header':
				// Update header background
				if($aLayoutData['header_background'])
				{
					$headerFile = $aLayoutData['header_background'];
					$headerFile->move($sImagePath,'header.png');
				}

				// Remove all HTML tag to keep host safe
				$sHeaderCSS = strip_tags($aLayoutData['header_css']);
				
				// Update header css
				$handle = fopen($sCSSPath."/header.css",'w');
				fwrite($handle, $sHeaderCSS);
				fclose($handle);
				break;
				
			case 'footer':
				// Update footer background
				if($aLayoutData['footer_background'])
				{
					$footerFile = $aLayoutData['footer_background'];
					$footerFile->move($sImagePath,'footer.png');
				}

				// Remove all HTML tag to keep host safe
				$sFooterCSS = strip_tags($aLayoutData['footer_css']);
				
				// Update footer css
				$handle = fopen($sCSSPath."/footer.css",'w');
				fwrite($handle, $sFooterCSS);
				fclose($handle);
				break;
				
			case 'home':
				// Update bookmarker list background
				if($aLayoutData['bookmarker_background'])
				{
					$bookmarkerFile = $aLayoutData['bookmarker_background'];
					$bookmarkerFile->move($sImagePath,'bookmarker_background.png');
				}

				// Update article list background
				if($aLayoutData['article_background'])
				{
					$articleFile = $aLayoutData['article_background'];
					$articleFile->move($sImagePath,'article_background.png');
				}
				
				// Remove all HTML tag to keep host safe
				$sHomeCSS = strip_tags($aLayoutData['home_css']);
				
				// Update home page css
				$handle = fopen($sCSSPath."/home.css",'w');
				fwrite($handle, $sHomeCSS);
				fclose($handle);
				break;
				
			case 'article':
				break;
		}
		
		return Redirect::route('admin.layout.edit', array('layout' => $oLayout->id))
				->with('layout', $oLayout)
				->with('layout_type', $aLayoutData['layout_type'])
				->with('flash_notice','The <strong>'.$aLayoutData['layout_type'].' layout</strong> had been updated successfully.');
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