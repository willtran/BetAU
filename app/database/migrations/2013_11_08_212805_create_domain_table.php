<?php

use Illuminate\Database\Migrations\Migration;

class CreateDomainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domains',function($table){
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('owner_id')->unsigned()->default(0);
			$table->string('analytic_id');
			$table->smallInteger('is_active')->unsigned()->default(1);
			$table->integer('category_id')->unsigned()->default(0);
			$table->integer('template_id')->unsigned()->default(0);
			$table->string('heading')->nullable();
			$table->string('title')->nullable();
			$table->text('keyword')->nullable();
			$table->text('description')->nullable();
			$table->timestamps();
		});
		
		Schema::table('domains',function($table)
		{
			$table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domains',function($table)
		{
			$table->dropForeign('domains_owner_id_foreign');
		});
		Schema::drop('domains');
	}

}