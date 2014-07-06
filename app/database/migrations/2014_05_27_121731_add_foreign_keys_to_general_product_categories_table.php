<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGeneralProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('general_product_categories', function(Blueprint $table)
		{
			$table->foreign('categories_id')->references('id')->on('categories');
			$table->foreign('general_products_id')->references('id')->on('general_products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('general_product_categories', function(Blueprint $table)
		{
			$table->dropForeign('general_product_categories_categories_id_foreign');
			$table->dropForeign('general_product_categories_general_products_id_foreign');
		});
	}

}
