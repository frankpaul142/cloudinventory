<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchases', function(Blueprint $table)
		{
			$table->foreign('mile_transactions_id')->references('id')->on('mile_transactions');
			$table->foreign('detailed_products_id')->references('id')->on('detailed_products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('purchases', function(Blueprint $table)
		{
			$table->dropForeign('purchases_mile_transactions_id_foreign');
			$table->dropForeign('purchases_detailed_products_id_foreign');
		});
	}

}
