<?php

use Illuminate\Database\Migrations\Migration;

class CreateCompany extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function($table) 
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->string('label');
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
		Schema::drop('companies');
	}

}