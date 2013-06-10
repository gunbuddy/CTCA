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

			$table->enum('payment', array('second', 'minute'));
			$table->enum('billing', array('monthly', 'weekly'));
			$table->string('networks');

			$table->integer('minutes_tolocal');
			$table->integer('minutes_toany');
			$table->integer('minutes_tosame');
			$table->integer('minutes_toother');

			$table->integer('seconds_tolocal');
			$table->integer('seconds_toany');
			$table->integer('seconds_tosame');
			$table->integer('seconds_toother');

			$table->integer('balance_tonational');
			$table->integer('balance_tolocal');
			$table->integer('balance_tosame');
			$table->integer('balance_toother');

			$table->integer('free_numbers_tosame');
			$table->integer('free_numbers_toother');

			$table->integer('messages');
			$table->integer('internet');
			$table->boolean('radio');
			$table->float('internet_speed');

			$table->float('additional_minute_any_national');
			$table->float('additional_minute_any_local');
			$table->float('additional_minute_tosame');
			$table->float('additional_minute_toother');
			$table->float('additional_minute_tolocal');

			$table->float('additional_second_any_national');
			$table->float('additional_second_any_local');
			$table->float('additional_second_tosame');
			$table->float('additional_second_toother');
			$table->float('additional_second_tolocal');

			$table->float('additional_message');
			$table->float('additional_internet_kb');
			$table->float('additional_internet_mb');
			$table->float('additional_mms');
			$table->text('additional_information');
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