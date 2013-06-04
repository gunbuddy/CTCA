<?php

use Illuminate\Database\Migrations\Migration;

class CreateSubCategories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subcategories', function($table) 
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('category_id');
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
		Schema::drop('subcategories');
	}

}