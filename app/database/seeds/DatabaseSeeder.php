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
		
		$this->call('CategoryTableSeeder');
		
		$this->command->info("Category table seeded!");
	}
}
