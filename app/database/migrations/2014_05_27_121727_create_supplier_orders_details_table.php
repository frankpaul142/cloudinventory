<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierOrdersDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_orders_details', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('supplier_orders_id')->index('`fk_supplier_orders_detail_supplier_orders1_idx`');
			$table->integer('redeemed_products_id')->index('`fk_supplier_orders_detail_redeemed_products1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_orders_details');
	}

}
