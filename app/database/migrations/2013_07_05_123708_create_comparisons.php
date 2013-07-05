<?php

use Illuminate\Database\Migrations\Migration;

class CreateComparisons extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comparisons', function($table) 
		{
			$table->increments('id');
			$table->string('level');
			$table->string('meta');
			$table->string('from');
			$table->integer('user_id');
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
		Schema::drop('comparisons');
	}

}