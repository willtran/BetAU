<?php

use Illuminate\Database\Migrations\Migration;

class UpdateDomainTableCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domains',function($table){
			$table->smallInteger('is_customized')->unsigned()->default(0)->after('template_id');
		});
		
		Schema::table('categories',function($table){
			$table->Integer('layout_id')->unsigned()->default(0)->after('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domains', function($table)
		{
		    $table->dropColumn('is_customized');
		});
		
		Schema::table('categories', function($table)
		{
		    $table->dropColumn('layout_id');
		});
	}

}