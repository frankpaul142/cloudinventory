<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_media', function(Blueprint $table)
		{
			$table->foreign('general_products_id')->references('id')->on('general_products');
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
		Schema::table('product_media', function(Blueprint $table)
		{
			$table->dropForeign('product_media_general_products_id_foreign');
			$table->dropForeign('product_media_product_features_id_foreign');
		});
	}

}
