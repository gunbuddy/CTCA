<?php

use Illuminate\Database\Migrations\Migration;

class CellplanUpdates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cellplans', function($table)
		{
		    $table->dropColumn('minutes_tolocal');
		    $table->dropColumn('minutes_toany');
		    $table->dropColumn('minutes_tosame');
		    $table->dropColumn('minutes_toother');
		    $table->dropColumn('seconds_tolocal');
		    $table->dropColumn('seconds_toany');
		    $table->dropColumn('seconds_tosame');
		    $table->dropColumn('seconds_toother');
		    $table->dropColumn('balance_tonational');
		    $table->dropColumn('balance_tolocal');
		    $table->dropColumn('balance_tosame');
		    $table->dropColumn('balance_toother');
		    $table->dropColumn('additional_minute_any_national');
		    $table->dropColumn('additional_minute_any_local');
		    $table->dropColumn('additional_minute_tosame');
		    $table->dropColumn('additional_minute_toother');
		    $table->dropColumn('additional_minute_tolocal');
		    $table->dropColumn('additional_second_any_national');
		    $table->dropColumn('additional_second_tosame');
		    $table->dropColumn('additional_second_toother');
		    $table->dropColumn('additional_second_tolocal');

		    $table->integer('minutes_localcompanies')->nullable();
		    $table->integer('minutes_everywhere')->nullable();
		    $table->integer('minutes_samecompany')->nullable();
		    $table->integer('seconds_localcompanies')->nullable();
		    $table->integer('seconds_everywhere')->nullable();
		    $table->integer('seconds_samecompany')->nullable();

		    $table->float('balance_localcompanies')->nullable();
		    $table->float('balance_everywhere')->nullable();
		    $table->float('balance_samecompany')->nullable();

		    $table->float('additional_minutes_nationalnumber')->nullable();
		    $table->float('additional_minutes_localnumber')->nullable();
		    $table->float('additional_minutes_samecompany')->nullable();
		    $table->float('additional_minutes_othercompany')->nullable();
		    $table->float('additional_minutes_fixednumber')->nullable();
		    $table->float('fee_minutes_nationalnumber')->nullable();
		    $table->float('fee_minutes_internationalld')->nullable();

		    $table->float('additional_seconds_nationalnumber')->nullable();
		    $table->float('additional_seconds_localnumber')->nullable();
		    $table->float('additional_seconds_samecompany')->nullable();
		    $table->float('additional_seconds_othercompany')->nullable();
		    $table->float('additional_seconds_fixednumber')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
	}

}