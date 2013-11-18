<?php

class IndexController extends BaseController {
	public function index()
	{
		$aDomain['host'] = $_SERVER['HTTP_HOST'];
		return View::make('template.home')->with('domain', $aDomain);
	}
}
