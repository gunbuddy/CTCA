<?php

use Illuminate\Database\Migrations\Migration;

class AddPromotionsToCellplans extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cellplans', function($table)
		{
		    $table->text('promotions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cellplans', function($table)
		{
		    $table->dropColumn('promotions');
		});
	}

}