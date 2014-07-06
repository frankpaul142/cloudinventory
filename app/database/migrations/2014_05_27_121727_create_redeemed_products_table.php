<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRedeemedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('redeemed_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('detailed_product_id')->index('`fk_redeemed_products_detailed_product1_idx`');
			$table->integer('mile_transactions_id')->index('`fk_redeemed_products_mile_transactions1_idx`');
			$table->decimal('tax_paid', 5, 3);
			$table->integer('members_id')->index('`fk_redeemed_products_members1_idx`');
			$table->integer('general_products_id')->index('`fk_redeemed_products_general_products1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('redeemed_products');
	}

}
