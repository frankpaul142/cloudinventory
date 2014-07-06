<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePqrsLogReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pqrs_log_reasons', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('description', 45);
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
		Schema::drop('pqrs_log_reasons');
	}

}
