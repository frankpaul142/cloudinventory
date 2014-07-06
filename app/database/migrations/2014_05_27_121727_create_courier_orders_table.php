<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourierOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courier_orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('courier_id')->index('`fk_courier_order_courier1_idx`');
			$table->integer('members_id')->index('`fk_courier_order_members1_idx`');
			$table->integer('supplier_orders_detail_id')->index('`fk_courier_order_supplier_orders_detail1_idx`');
			$table->enum('status', array('received','shipped','delivered'))->default('received');
			$table->string('tracking_number', 45);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courier_orders');
	}

}
