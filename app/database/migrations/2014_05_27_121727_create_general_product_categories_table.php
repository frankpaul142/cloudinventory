<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('general_product_categories', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('categories_id')->index('`fk_general_product_categories_categories1_idx`');
			$table->integer('general_products_id')->index('`fk_general_product_categories_general_products1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('general_product_categories');
	}

}
