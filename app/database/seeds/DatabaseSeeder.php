<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{		
		$this->call('UserTableSeeder');
		
		$this->command->info("User table seeded!");
		
		$this->call('DomainTableSeeder');
		
		$this->command->info("Domain table seeded!");
	}

}

class UserTableSeeder extends Seeder 
{
	public function run()
	{	 
		User::create(array(
			'email'		=>	'luantien411@gmail.com',
			'username' 	=>	'admin_1',
			'password'	=>	Hash::make('123456'),
			'level_id'	=>	1
		));
	}
}


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
