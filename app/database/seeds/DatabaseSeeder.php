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
	}

}

class UserTableSeeder extends Seeder 
{
	public function run()
	{	 
		User::create(array(
			'email'		=>	'will@wtran.net',
			'username' 	=>	'admin',
			'password'	=>	Hash::make('123456'),
			'level_id'	=>	1
		));
	}
}
