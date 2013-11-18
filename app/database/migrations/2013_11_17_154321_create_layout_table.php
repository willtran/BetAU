<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableLayouts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domains',function($table){
			$table->increments('id');
			$table->string('name',64)->unique();
			$table->string('label',64)->unique();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}