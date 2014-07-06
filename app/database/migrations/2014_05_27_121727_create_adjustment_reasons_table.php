<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdjustmentReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustment_reasons', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 45);
			$table->enum('status', array('active','inactive'))->default('active');
			$table->string('created_at', 45);
			$table->string('updated_at', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adjustment_reasons');
	}

}
