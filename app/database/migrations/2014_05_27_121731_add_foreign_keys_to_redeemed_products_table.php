<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRedeemedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('redeemed_products', function(Blueprint $table)
		{
			$table->foreign('detailed_product_id')->references('id')->on('detailed_products');
			$table->foreign('mile_transactions_id')->references('id')->on('mile_transactions');
			$table->foreign('members_id')->references('id')->on('members');
			$table->foreign('general_products_id')->references('id')->on('general_products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('redeemed_products', function(Blueprint $table)
		{
			$table->dropForeign('redeemed_products_detailed_product_id_foreign');
			$table->dropForeign('redeemed_products_mile_transactions_id_foreign');
			$table->dropForeign('redeemed_products_members_id_foreign');
			$table->dropForeign('redeemed_products_general_products_id_foreign');
		});
	}

}
