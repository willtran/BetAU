<?php

class IndexController extends BaseController {
	public function index()
	{
		// Get domain through domain hostname
		$sHost = $_SERVER['HTTP_HOST'];
	
		$aQuery = DB::table('domains')
			->join('categories','domains.category_id','=','categories.id')
			->join('layouts','layouts.id','=','categories.layout_id')
			->where('domains.name', '=', $sHost)->limit(1)->get(array('domains.*','layouts.id as layout_id'));
	
		// Return 404 error page when getting no domain
		if(!$aQuery)
		{
			return View::make('404');
		}
		
		$aDomain = $aQuery[0];
		
		// Return 404 error if domain is inactive
		if(!$aDomain->is_active)
		{
			return View::make('404');
		}
		
		// Process layout link for domain
		$cssLinks = array();
		if($aDomain->is_customized)
		{
			
		}
		else 
		{
			$sLayoutPath = '/layout/'.$aDomain->layout_id.'/css/';
			$cssLinks = array(
				'header' 	=> $sLayoutPath.'header.css',
				'footer'	=> $sLayoutPath.'footer.css',
				'home'		=> $sLayoutPath.'home.css',
			);
		}
		
		return View::make('template.home')
				->with('domain', $aDomain)
				->with('cssLinks', $cssLinks);
	}
}
