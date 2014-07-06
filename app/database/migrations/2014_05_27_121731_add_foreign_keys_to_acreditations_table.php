<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAcreditationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('acreditations', function(Blueprint $table)
		{
			$table->foreign('mile_transactions_id')->references('id')->on('mile_transactions');
			$table->foreign('promo_id')->references('id')->on('promos');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('acreditations', function(Blueprint $table)
		{
			$table->dropForeign('acreditations_mile_transactions_id_foreign');
			$table->dropForeign('acreditations_promo_id_foreign');
		});
	}

}
