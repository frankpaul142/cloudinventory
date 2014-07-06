<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierOrdersDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('supplier_orders_details', function(Blueprint $table)
		{
			$table->foreign('supplier_orders_id')->references('id')->on('supplier_orders');
			$table->foreign('redeemed_products_id')->references('id')->on('redeemed_products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('supplier_orders_details', function(Blueprint $table)
		{
			$table->dropForeign('supplier_orders_details_supplier_orders_id_foreign');
			$table->dropForeign('supplier_orders_details_redeemed_products_id_foreign');
		});
	}

}
