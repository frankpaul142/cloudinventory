<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_features', function(Blueprint $table)
		{
			$table->foreign('product_id')->references('id')->on('general_products');
			$table->foreign('features_id')->references('id')->on('features');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_features', function(Blueprint $table)
		{
			$table->dropForeign('product_features_product_id_foreign');
			$table->dropForeign('product_features_features_id_foreign');
		});
	}

}
