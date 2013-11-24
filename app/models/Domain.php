<?php

class Domain extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'domains';
	
	/**
	 * The database fields that can be mass-assignment
	 * 
	 * @var string
	 */
	protected $fillable = array('name', 'owner_id', 'analytic_id', 'is_active','category_id', 'template_id', 'is_customized', 'article_columns', 'heading', 'title', 'keyword', 'description');
	
	/**
	 * The database fields that cannot be mass-assignment
	 * 
	 * @var string
	 */
	protected $guarded = array('id');

	/**
	 * Get domain select list
	 */
	public function getDomainSelect()
	{
		$oDomains = $this->orderBy('name', 'ASC')->get(array('id', 'name'));
		
		$aSelect = array('0' => '--- Select a domain ---'); 
		if(count($oDomains)>0)
		{
			foreach($oDomains as $oDomain)
			{
				$aSelect[$oDomain->id] = $oDomain->name;
			}
		}
		return $aSelect;
	}
	
	/**
	 * Get domain through host name
	 */
	public function getDomainByHostName($sHost)
	{
		// Return false if gotten no host name
		if(!$sHost)
		{
			return false;
		}
		
		// Process
		$aDomains = DB::table('domains')
			->join('categories','domains.category_id','=','categories.id')
			->join('layouts','layouts.id','=','categories.layout_id')
			->where('domains.name', '=', $sHost)->limit(1)->get(array('domains.*','layouts.id as layout_id'));
		
		if(!$aDomains)
		{
			return false;
		}
		else 
		{
			// Return the first one 
			return $aDomains[0];	
		}
	}
}