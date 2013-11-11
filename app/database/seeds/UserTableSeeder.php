<?php

class UserTableSeeder extends Seeder 
{
	public function run()
	{	 
		User::create(array(
			'email'		=>	'luantien411@gmail.com',
			'username' 	=>	'admin',
			'password'	=>	Hash::make('123456'),
			'level_id'	=>	1
		));
	}
}