<?php

class Category extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	
	/**
	 * The database fields that can be mass-assignment
	 * 
	 * @var string
	 */
	protected $fillable = array('name');
	
	/**
	 * The database fields that cannot be mass-assignment
	 * 
	 * @var string
	 */
	protected $guarded = array('id');
	
	/**
	 * Get category select list
	 */
	public function getCategorySelect()
	{
		$oCategories = $this->orderBy('name', 'ASC')->get();
		$aSelect = array('0' => 'None'); 
		if(count($oCategories)>0)
		{
			foreach($oCategories as $oCategory)
			{
				$aSelect[$oCategory->id] = $oCategory->name;
			}
		}
		return $aSelect;
	}
}