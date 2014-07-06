<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductFeatureOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_feature_options', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('options_id')->nullable()->index('`fk_product_feature_options_options1_idx`');
			$table->integer('product_features_id')->index('`fk_product_feature_options_product_features1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_feature_options');
	}

}
