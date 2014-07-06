<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_taxes', function(Blueprint $table)
		{
			$table->foreign('general_products_id')->references('id')->on('general_products');
			$table->foreign('taxes_id')->references('id')->on('taxes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_taxes', function(Blueprint $table)
		{
			$table->dropForeign('product_taxes_general_products_id_foreign');
			$table->dropForeign('product_taxes_taxes_id_foreign');
		});
	}

}
