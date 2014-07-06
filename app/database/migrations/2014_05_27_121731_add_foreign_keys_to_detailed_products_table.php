<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detailed_products', function(Blueprint $table)
		{
			$table->foreign('feature_1')->references('id')->on('product_feature_options');
			$table->foreign('feature_2')->references('id')->on('product_feature_options');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detailed_products', function(Blueprint $table)
		{
			$table->dropForeign('detailed_products_feature_1_foreign');
			$table->dropForeign('detailed_products_feature_2_foreign');
		});
	}

}
