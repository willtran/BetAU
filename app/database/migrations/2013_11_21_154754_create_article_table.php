<?php

use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles',function($table){
			$table->increments('id');
			$table->integer('domain_id')->unsigned()->default(0);
			$table->string('title')->unique();
			$table->string('label')->unique();
			$table->string('cover_image');
			$table->string('description');
			$table->text('short_content');
			$table->text('content');
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
		Schema::drop('articles');
	}

}