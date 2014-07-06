<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGeneralProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('general_products', function(Blueprint $table)
		{
			$table->foreign('supplier_id')->references('id')->on('suppliers');
			$table->foreign('brands_id')->references('id')->on('brands');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('general_products', function(Blueprint $table)
		{
			$table->dropForeign('general_products_supplier_id_foreign');
			$table->dropForeign('general_products_brands_id_foreign');
		});
	}

}
