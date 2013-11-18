<?php

use Illuminate\Database\Migrations\Migration;

class UpdateDomainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('domains', function($table)
		{
			$table->integer('article_columns')->unsigned()->default(1)->after('template_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('domainsw', function($table)
		{
		    $table->dropColumn('article_columns');
		});
	}

}