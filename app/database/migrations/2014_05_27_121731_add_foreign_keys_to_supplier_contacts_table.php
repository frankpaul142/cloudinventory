<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSupplierContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('supplier_contacts', function(Blueprint $table)
		{
			$table->foreign('suppliers_id')->references('id')->on('suppliers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('supplier_contacts', function(Blueprint $table)
		{
			$table->dropForeign('supplier_contacts_suppliers_id_foreign');
		});
	}

}
