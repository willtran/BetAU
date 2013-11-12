<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get all categories in the system
		$aCategories = Category::all();
		
		return View::make('category.index')->with('categories', $aCategories)
		->with('menu', array('main'=>'category','side_bar'=>'index'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('category.create')
		->with('menu', array('main'=>'category','side_bar'=>'create'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$aCategoryData = Input::all();                

        // Define validation rules
        $aRules = array(
        	'name'  => 'required|unique:categories,name'
        );
		
		// Process validation checking, redirect to create form if the validation was failed,
		// otherwise create a new user, 
		$oValidation = Validator::make($aCategoryData, $aRules);
		
		if($oValidation->fails())
		{
			return Redirect::route('admin.category.create')->withErrors($oValidation)->withInput();
		}
		
		$oCategory = new Category($aCategoryData);
		$oCategory->save();
		
		return Redirect::route('admin.category.index')->with('flash_notice', 'Category <strong>'.$aCategoryData['name'].'</strong> had been added.');;
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
		$oCategory = Category::find($id);
		
		if(!$oCategory)
		{
			return Redirect::route('admin.category.index')->with('flash_error', 'The category not found!');
		}
		else 
		{
			return View::make('category.edit')->with('category', $oCategory)
					->with('menu', array('main'=>'category','side_bar'=>'index'));
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
		$oCategory = Category::find($id);
		
		if(!$oCategory)
		{
			return Redirect::route('admin.category.index')
				->with('flash_error', 'The category not found!')
				->withInput();
		}

		// Get post data
		$aCategoryData = Input::all();
		
		// Define validation rules
		$aRules = array();
		if($aCategoryData['name'] != $oCategory->name)
		{
			$aRules['name'] =  'required|unique:categories,name';
		}

		// Process validation checking, redirect to edit form if the validation was failed,
		// otherwise update the selected user, 
		$oValidation = Validator::make($aCategoryData, $aRules);
		if($oValidation->fails())
		{
			return Redirect::route('admin.category.edit', array('category'=>$oCategory->id))->withErrors($oValidation);
		}
		
		// Process update user information
		$oCategory->name  = $aCategoryData['name'];
		$oCategory->save();
		
		return Redirect::route('admin.category.index')->with('flash_notice', 'Category <strong>"'.$oCategory->name.'"</strong> had been successfully updated.');
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
		$oCategory = Category::find($id);
		if(!$oCategory)
		{
			return Redirect::route('admin.category.index')
					->with('flash_error', 'The category not found!')
					->withInput();
		}
		
		// Process delete user
		$oCategory->delete();
		
		return 'The category <strong>"'.$oCategory->name.'"</strong> had been successfully deleted!';
	}

}