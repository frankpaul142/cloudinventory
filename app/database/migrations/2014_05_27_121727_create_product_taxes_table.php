<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_taxes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('general_products_id')->index('`fk_product_taxes_general_products1_idx`');
			$table->integer('taxes_id')->index('`fk_product_taxes_taxes1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_taxes');
	}

}
