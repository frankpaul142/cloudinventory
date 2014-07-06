<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->decimal('mile_cost', 5, 4);
			$table->integer('mile_transactions_id')->index('`fk_purchase_mile_transactions1_idx`');
			$table->integer('detailed_products_id')->nullable()->index('`fk_purchase_detailed_products1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases');
	}

}
