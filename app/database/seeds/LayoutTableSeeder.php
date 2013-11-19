<?php

class LayoutTableSeeder extends Seeder
{
	public function run()
	{
		$aInputs = array('Sport', 'Racing');
		
		foreach($aInputs as $sInput)
		{
			Layout::create(array(
				'name'	=> $sInput,
				'label'	=> strtolower($sInput)
			));
		}
	}
}