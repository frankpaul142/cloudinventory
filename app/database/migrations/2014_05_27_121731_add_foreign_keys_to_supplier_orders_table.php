<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('supplier_orders', function(Blueprint $table)
		{
			$table->foreign('supplier_id')->references('id')->on('suppliers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('supplier_orders', function(Blueprint $table)
		{
			$table->dropForeign('supplier_orders_supplier_id_foreign');
		});
	}

}
