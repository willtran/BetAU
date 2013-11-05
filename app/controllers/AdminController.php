<?php

class AdminController extends BaseController {

	public function index()
	{
		return View::make('admin.index');
	}
	
	public function home()
	{
		return View::make('admin.home');
	}
}