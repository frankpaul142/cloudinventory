<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductFeatureOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_feature_options', function(Blueprint $table)
		{
			$table->foreign('options_id')->references('id')->on('options');
			$table->foreign('product_features_id')->references('id')->on('product_features');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_feature_options', function(Blueprint $table)
		{
			$table->dropForeign('product_feature_options_options_id_foreign');
			$table->dropForeign('product_feature_options_product_features_id_foreign');
		});
	}

}
