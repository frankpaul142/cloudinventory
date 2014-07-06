<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCouriersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('couriers', function(Blueprint $table)
		{
			$table->foreign('cities_id')->references('id')->on('cities');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('couriers', function(Blueprint $table)
		{
			$table->dropForeign('couriers_cities_id_foreign');
		});
	}

}
