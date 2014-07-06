<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_adresses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('suppliers_id')->index('`fk_supplier_adresses_suppliers1_idx`');
			$table->string('supplier_adressescol', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplier_adresses');
	}

}
