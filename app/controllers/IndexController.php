<?php

class IndexController extends BaseController {
	public function index()
	{
		// Get domain through domain hostname
		$sHost = $_SERVER['HTTP_HOST'];
	
		$oDomainModel = new Domain();
		$aDomain = $oDomainModel->getDomainByHostName($sHost);
	
		// Return 404 error page when getting no domain
		if(!$aDomain)
		{
			return View::make('404');
		}
		
		// Return 404 error if domain is inactive
		if(!$aDomain->is_active)
		{
			return View::make('404');
		}
		
		// Get Domain's Article
		$oArticle = new Article();
		$aArticles = $oArticle->getArticlesByDomainId($aDomain->id);
		
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
				->with('articles', $aArticles)
				->with('cssLinks', $cssLinks);
	}
	public function article($article)
	{
		// Get domain through domain hostname
		$sHost = $_SERVER['HTTP_HOST'];
		
		$oDomainModel = new Domain();
		$aDomain = $oDomainModel->getDomainByHostName($sHost);
	
		// Return 404 error page when getting no domain
		if(!$aDomain)
		{
			return View::make('404');
		}
		
		// Return 404 error if domain is inactive
		if(!$aDomain->is_active)
		{
			return View::make('404');
		}
		
		// Get Domain's Article
		$oArticle = new Article();
		$aArticle = $oArticle->getArticleByLabel($aDomain->id, $article);
		
		if(!$aArticle)
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
				'article'	=> $sLayoutPath.'article.css',
			);
		}
		
		return View::make('template.article')
				->with('domain', $aDomain)
				->with('article', $aArticle)
				->with('cssLinks', $cssLinks);
	}
}
