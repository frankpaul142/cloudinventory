<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('supplier_id')->index('`fk_supplier_orders_supplier1_idx`');
			$table->string('tracking_number', 45);
			$table->enum('status', array('ordered','shipped','delivered'))->default('ordered');
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
		Schema::drop('supplier_orders');
	}

}
