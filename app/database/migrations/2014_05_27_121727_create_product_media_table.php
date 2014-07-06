<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_media', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('general_products_id')->nullable()->index('`fk_detailed_product_media_general_products1_idx`');
			$table->integer('product_features_id')->nullable()->index('`fk_detailed_product_media_product_features1_idx`');
			$table->string('file_name', 45);
			$table->enum('type', array('img','video'))->default('img');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_media');
	}

}
