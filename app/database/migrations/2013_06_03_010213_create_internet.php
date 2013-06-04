<?php

use Illuminate\Database\Migrations\Migration;

class CreateInternet extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('internet', function($table) 
		{
			$table->increments('id');
			$table->integer('company_id');
			$table->string('name');
			$table->enum('modem', array('wired', 'wireless'));
			$table->float('fee');
			$table->float('download_speed');
			$table->float('upload_speed');
			$table->integer('included_mb');
			$table->enum('length', array('0', '12', '24', '18'));
			$table->float('modem_fee');
			$table->float('cancel_fee');
			$table->text('information');
			$table->text('promo');
			$table->text('requirements');
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
		Schema::drop('internet');
	}

}