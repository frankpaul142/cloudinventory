<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProgramMilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('program_miles', function(Blueprint $table)
		{
			$table->foreign('mile_transactions_id')->references('id')->on('mile_transactions');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('program_miles', function(Blueprint $table)
		{
			$table->dropForeign('program_miles_mile_transactions_id_foreign');
		});
	}

}
