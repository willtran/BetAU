<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index')
			->with('menu', array('main'=>'home','side_bar'=>'welcome'));
	}
}