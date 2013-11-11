<?php

class DomainTableSeeder extends Seeder
{
	public function run()
	{
		for($i=1;$i<=50;$i++)
		{
			Domain::create(array(
				'name' => 'test_domain_'.$i.'.com.au',
				'owner_id'	=> 1,
				'analytic_id'	=> 'UA-28254526-X',
				'heading'	=> 'test domain '.$i,
				'title'	=> 'test domain '.$i,
				'keyword' => 'test domain '.$i,
				'description' => 'test domain '.$i
			));	
		}
		
	}
}