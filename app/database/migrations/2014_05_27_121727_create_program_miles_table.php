<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProgramMilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('program_miles', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('created_at', 45)->nullable();
			$table->string('updated_at', 45)->nullable();
			$table->enum('movement', array('c','d'))->nullable();
			$table->integer('mile_transactions_id')->index('`fk_program_miles_mile_transactions1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('program_miles');
	}

}
