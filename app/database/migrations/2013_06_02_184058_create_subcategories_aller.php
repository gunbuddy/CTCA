<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesAller extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcategories', function($table)
		{
		    $table->string('aller');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcategories', function($table)
		{
		    $table->dropColumn('aller');
		});
	}

}