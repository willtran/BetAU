<?php

class Layout extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'layouts';
	
	/**
	 * The database fields that can be mass-assignment
	 * 
	 * @var string
	 */
	protected $fillable = array('name', 'label');
	
	/**
	 * The database fields that cannot be mass-assignment
	 * 
	 * @var string
	 */
	protected $guarded = array('id');
	
	/**
	 * Get category select list
	 */
	public function getLayoutSelect()
	{
		$oLayouts = $this->orderBy('name', 'ASC')->get();
		$aSelect = array('' => '--- Select a layout ---'); 
		if(count($oLayouts)>0)
		{
			foreach($oLayouts as $oLayout)
			{
				$aSelect[$oLayout->id] = $oLayout->name;
			}
		}
		return $aSelect;
	}
	
	/**
	 * Create layout directory to store css and image file
	 */
	public function createLayoutStorage()
	{
		$iId = $this->id;
		// Return false if gotten no id for selecting layout
		if(!$iId)
		{
			return false;
		}
		// Create directory for layout
		$sLayoutDirectory = public_path() . "/layout/" . $iId;
		if(!is_dir($sLayoutDirectory))
		{
			mkdir($sLayoutDirectory);
			// Create CSS and Image directory
			$sLayoutCSS = $sLayoutDirectory . "/css";
			$sLayoutImages = $sLayoutDirectory . "/images";
			if(!is_dir($sLayoutCSS))
			{
				mkdir($sLayoutCSS);
			}
			if(!is_dir($sLayoutImages))
			{
				mkdir($sLayoutImages);
			}
		}
		return $sLayoutDirectory;
	}
	
	/**
	 * Create layout css file and background image
	 */
	public function createLayoutFiles($aLayoutData)
	{
		$sLayoutDirectory = $this->createLayoutStorage();
		// Return false if cannot receive layout directory
		if(!$sLayoutDirectory)
		{
			return false;
		}
		
		// Process create layout files
		$sCoreLayout = public_path()."/layout/core";
		$sImagePath = $sLayoutDirectory."/images";
		$sCSSPath = $sLayoutDirectory."/css";
		
		/** Process Add Background Images **/
		// Header background
		if($aLayoutData['header_background'])
		{
			$headerFile = $aLayoutData['header_background'];
			$headerFile->move($sImagePath,'header.png');
		}
		else
		{
			copy($sCoreLayout."/images/header.png", $sImagePath."/header.png");
		}
		
		// Footer background
		if($aLayoutData['footer_background'])
		{
			$footerFile = $aLayoutData['footer_background'];
			$footerFile->move($sImagePath, 'footer.png');
		}
		else
		{
			copy($sCoreLayout."/images/footer.png", $sImagePath."/footer.png");
		}
		
		// Bookmarker background
		if($aLayoutData['bookmarker_background'])
		{
			$footerFile = $aLayoutData['bookmarker_background'];
			$footerFile->move($sImagePath, 'bookmarker_background.png');
		}
		else
		{
			copy($sCoreLayout."/images/bookmarker_background.png", $sImagePath."/bookmarker_background.png");
		}
		// Article background
		if($aLayoutData['article_background'])
		{
			$footerFile = $aLayoutData['article_background'];
			$footerFile->move($sImagePath, 'article_background.png');
		}
		else
		{
			copy($sCoreLayout."/images/article_background.png", $sImagePath."/article_background.png");
		}
		
		// Image Background
		$sHeaderBG = "../images/header.png";
		$sFooterBG = "../images/footer.png";
		$sBookmarkerBG = "../images/bookmarker_background.png";
		$sArticleBG = "../images/article_background.png";
		// Get text color code input
		$sHeaderColor 		= $aLayoutData['header_text_color']?$aLayoutData['header_text_color']:'ffffff';
		$sHeaderHoverColor 	= $aLayoutData['header_hover_color']?$aLayoutData['header_hover_color']:'ff6600';
		$sFooterColor 		= $aLayoutData['footer_text_color']?$aLayoutData['footer_text_color']:'767676';
		$sFooterHoverColor 	= $aLayoutData['footer_hover_color']?$aLayoutData['footer_hover_color']:'ffa303';
		$sBookmarkerColor	= $aLayoutData['bookmarker_text_color']?$aLayoutData['bookmarker_text_color']:'ffffff';
		$sArticleTitleColor	= $aLayoutData['article_title_color']?$aLayoutData['article_title_color']:'001e3a';
		$sArticleHoverColor	= $aLayoutData['article_title_hover_color']?$aLayoutData['article_title_hover_color']:'ffa303';
		$sArticleDescColor 	= $aLayoutData['article_description_color']?$aLayoutData['article_description_color']:'004b20';
		
		// Header CSS File
		$headerCSS = File::get($sCoreLayout.'/css/header.css');
		$headerCSS = str_replace("<header_background>", $sHeaderBG, $headerCSS);
		$headerCSS = str_replace("<header_text_color>", "#".$sHeaderColor, $headerCSS);
		$headerCSS = str_replace("<header_text_hover_color>", "#".$sHeaderHoverColor, $headerCSS);
		File::put($sCSSPath."/header.css",$headerCSS);
		
		// Footer CSS File
		$footerCSS = File::get($sCoreLayout.'/css/footer.css');
		$footerCSS = str_replace("<footer_background>", $sFooterBG, $footerCSS);
		$footerCSS = str_replace("<footer_text_color>", "#".$sFooterColor, $footerCSS);
		$footerCSS = str_replace("<footer_text_hover_color>", "#".$sFooterHoverColor, $footerCSS);
		File::put($sCSSPath."/footer.css", $footerCSS);
		
		// Home CSS File
		$homeCSS = File::get($sCoreLayout.'/css/home.css');
		$homeCSS = str_replace('<bookmarker_background>', $sBookmarkerBG, $homeCSS);
		$homeCSS = str_replace('<bookmarker_text_color>', "#".$sBookmarkerColor, $homeCSS);
		$homeCSS = str_replace('<article_background>', $sArticleBG, $homeCSS);
		$homeCSS = str_replace('<article_title_color>', "#".$sArticleTitleColor, $homeCSS);
		$homeCSS = str_replace('<article_title_hover_color>', "#".$sArticleHoverColor, $homeCSS);
		$homeCSS = str_replace('<article_description_color>', "#".$sArticleDescColor, $homeCSS);
		File::put($sCSSPath."/home.css", $homeCSS);
		
		// Article CSS File
		return true;
	}
}