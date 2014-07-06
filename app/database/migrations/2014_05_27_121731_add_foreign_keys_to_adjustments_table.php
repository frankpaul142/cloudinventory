<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAdjustmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('adjustments', function(Blueprint $table)
		{
			$table->foreign('mile_transactions_id')->references('id')->on('mile_transactions');
			$table->foreign('mile_transactions_id1')->references('id')->on('mile_transactions');
			$table->foreign('adjustment_reasons_id')->references('id')->on('adjustment_reasons');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('adjustments', function(Blueprint $table)
		{
			$table->dropForeign('adjustments_mile_transactions_id_foreign');
			$table->dropForeign('adjustments_mile_transactions_id1_foreign');
			$table->dropForeign('adjustments_adjustment_reasons_id_foreign');
		});
	}

}
