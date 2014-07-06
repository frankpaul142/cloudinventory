<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailedProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detailed_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('feature_1')->index('`fk_detailed_product_product_feature_options1_idx`');
			$table->integer('feature_2')->nullable()->index('`fk_detailed_product_product_feature_options2_idx`');
			$table->decimal('cost', 8, 3);
			$table->integer('miles_cost');
			$table->decimal('each_mile_cost', 5, 4);
			$table->integer('arrive_in_days');
			$table->decimal('assured_value', 8, 3)->nullable();
			$table->decimal('shipping_cost', 8, 3);
			$table->boolean('is_on_sale');
			$table->integer('stock');
			$table->enum('status', array('active','inactive'))->default('active');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detailed_products');
	}

}
