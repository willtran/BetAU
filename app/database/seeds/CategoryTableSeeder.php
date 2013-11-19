<?php

class CategoryTableSeeder extends Seeder
{
	public function run()
	{
		$aInputs = array('AFL','Baseball','Basketball','Betting',
						'Boxing','Casino and Poker','Cricket','Forum',
						'Free','Greyhound Racing','Harness Racing','Horse Racing',
						'Motor Racing','NFL','NRF','Rugby Union',
						'Soccer','Sportsbet','SurfingTAB','UF','Undefined');
		foreach($aInputs as $sInput)
		{
			Category::create(array(
				'name'		=> $sInput,
				'layout_id'	=> 1
			));
		}
	}
}