<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePqrsLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pqrs_logs', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->integer('pqrs_id')->index('`fk_pqrs_tracking_pqrs1_idx`');
			$table->integer('pqrs_location_id')->index('`fk_pqrs_tracking_pqrs_location1_idx`');
			$table->timestamps();
			$table->text('description');
			$table->enum('status', array('solved','superior'))->nullable();
			$table->integer('pqrs_log_reason_id')->index('`fk_pqrs_logs_pqrs_log_reason1_idx`');
			$table->integer('users_id')->index('`fk_pqrs_logs_users1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pqrs_logs');
	}

}
