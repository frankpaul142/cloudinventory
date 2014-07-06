<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourierOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('courier_orders', function(Blueprint $table)
		{
			$table->foreign('courier_id')->references('id')->on('couriers');
			$table->foreign('members_id')->references('id')->on('members');
			$table->foreign('supplier_orders_detail_id')->references('id')->on('supplier_orders_details');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('courier_orders', function(Blueprint $table)
		{
			$table->dropForeign('courier_orders_courier_id_foreign');
			$table->dropForeign('courier_orders_members_id_foreign');
			$table->dropForeign('courier_orders_supplier_orders_detail_id_foreign');
		});
	}

}
