<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductFeaturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_features', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('product_id')->index('`fk_product_features_product_idx`');
			$table->integer('features_id')->nullable()->index('`fk_product_features_features1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_features');
	}

}
