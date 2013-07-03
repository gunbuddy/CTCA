<?php

use Illuminate\Database\Migrations\Migration;

class AddWikiToCompanies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function($table)
		{
		    $table->string('wiki')->after('label')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function($table)
		{
		    $table->dropColumn('wiki');
		});
	}

}