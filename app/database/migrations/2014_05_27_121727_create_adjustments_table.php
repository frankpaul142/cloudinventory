<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdjustmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('mile_transactions_id')->index('`fk_debit_mile_transactions1_idx`');
			$table->integer('mile_transactions_id1')->index('`fk_debit_mile_transactions2_idx`');
			$table->integer('adjustment_reasons_id')->index('`fk_adjustments_adjustment_reasons1_idx`');
			$table->text('description')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adjustments');
	}

}
