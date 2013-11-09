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
	protected $fillable = array('name', 'owner_id', 'analytic_id', 'is_active','category_id', 'template_id','heading', 'title', 'keyword', 'description');
	
	/**
	 * The database fields that cannot be mass-assignment
	 * 
	 * @var string
	 */
	protected $guarded = array('id');

}