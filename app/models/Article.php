<?php

class Article extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articles';
	
	/**
	 * The database fields that can be mass-assignment
	 * 
	 * @var string
	 */
	protected $fillable = array('domain_id', 'title', 'label', 'cover_image', 'description', 'short_content', 'content');
	
	/**
	 * The database fields that cannot be mass-assignment
	 * 
	 * @var string
	 */
	protected $guarded = array('id');
	
	/**
	 * Create layout directory to store css and image file
	 */
	public function createImageStorage()
	{
		$iId = $this->id;
		// Return false if gotten no id for selecting article
		if(!$iId)
		{
			return false;
		}
		// Create directory for article
		$sArticleDirectory = public_path() . "/article";
		if(!is_dir($sArticleDirectory))
		{
			mkdir($sArticleDirectory);
		}
		$sStorageDirectory = $sArticleDirectory . "/" . $iId;
		if(!is_dir($sStorageDirectory))
		{
			mkdir($sStorageDirectory);
		}
		return $sStorageDirectory;
	}
	
	public function getArticlesByDomainId($iDomainId = 0)
	{
		// Return false when input is empty
		if(!$iDomainId)
		{
			return false;
		}	
		
		$aArticles = DB::table('articles')
						->where('domain_id', '=', $iDomainId)
						->orderBy('updated_at','DESC')
						->get(array('id', 'domain_id','title','label', 'cover_image', 'description','short_content'));
		
		return $aArticles;
	}
	
	public function getArticleByLabel($iDomainId = 0, $sLabel = '')
	{
		// Return false when input is empty
		if(!$iDomainId || !$sLabel)
		{
			return false;
		}	
		
		$aArticles = DB::table('articles')
						->where('domain_id', '=', $iDomainId)
						->where('label', '=', $sLabel)
						->limit(1)
						->get();
		
		// Return false when gotten no article 
		if(!$aArticles)
		{
			return false;
		}
		// Return the first one
		return $aArticles[0];
	}
}