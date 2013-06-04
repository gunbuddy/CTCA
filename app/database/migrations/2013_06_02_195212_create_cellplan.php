<?php

use Illuminate\Database\Migrations\Migration;

class CreateCellplan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cellplans', function($table) 
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->string('name');
			$table->float('fee');
			$table->string('length');
			$table->string('region');
			$table->integer('minutes');
			$table->integer('minutes_toother');
			$table->integer('minutes_tosame');
			$table->integer('minutes_toany');
			$table->integer('messages');
			$table->integer('free_numbers_tosame');
			$table->integer('free_numbers_toother');
			$table->integer('internet');
			$table->float('internet_speed');
			$table->enum('payment', array('second', 'minute'));
			$table->string('networks');
			$table->boolean('radio');
			$table->text('additional');
			$table->text('information');
			$table->text('promo');
			$table->text('recommended');
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
		Schema::drop('cellplans');
	}

}