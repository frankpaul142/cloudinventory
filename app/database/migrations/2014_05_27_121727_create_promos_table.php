<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promos', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('entities_id')->index('`fk_promo_entities1_idx`');
			$table->string('code', 6);
			$table->string('name', 45);
			$table->text('description')->nullable();
			$table->enum('status', array('active','inactive'))->default('active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('promos');
	}

}
