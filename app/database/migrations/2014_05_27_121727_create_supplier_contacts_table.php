<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplier_contacts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('suppliers_id')->index('`fk_supplier_contacts_suppliers1_idx`');
			$table->string('first_name', 75);
			$table->string('last_name', 75);
			$table->string('email', 45)->nullable();
			$table->string('phone', 15);
			$table->string('extension', 10)->nullable();
			$table->string('mobile', 45)->nullable();
			$table->enum('type', array('comercial','storage','billing'));
			$table->enum('status', array('active','inactive'))->default('active');
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
		Schema::drop('supplier_contacts');
	}

}
