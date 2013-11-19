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
				'category_id'	=> 1,
				'template_id'	=> 5,
				'article_columns'	=> 2,
				'heading'	=> 'The Best Bookmaker Promotions',
				'title'	=> 'test domain '.$i,
				'keyword' => 'test domain '.$i,
				'description' => 'We review Australia\'s favourite sports betting and Bet Au sites along with tips for increasing your chances at winning big bucks betting online! We cover sports such as horse racing, AFL, greyhound racing and other Australian favourite sports.',
			));	
		}
		
	}
}