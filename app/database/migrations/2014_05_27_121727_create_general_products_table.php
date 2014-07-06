<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGeneralProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('general_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('supplier_id')->index('`fk_general_product_supplier1_idx`');
			$table->integer('brands_id')->index('`fk_general_products_brands1_idx`');
			$table->string('name', 150);
			$table->string('short_description', 300);
			$table->text('long_description')->nullable();
			$table->decimal('weight', 5)->nullable();
			$table->enum('weight_unit', array('g','kg','lb'))->nullable();
			$table->decimal('lenght', 5)->nullable();
			$table->decimal('height', 5)->nullable();
			$table->decimal('width', 5)->nullable();
			$table->enum('dimensions_unit', array('cm','m'))->nullable();
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
		Schema::drop('general_products');
	}

}
