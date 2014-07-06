<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPqrsLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pqrs_logs', function(Blueprint $table)
		{
			$table->foreign('pqrs_id')->references('id')->on('pqrs');
			$table->foreign('pqrs_location_id')->references('id')->on('pqrs_areas');
			$table->foreign('pqrs_log_reason_id')->references('id')->on('pqrs_log_reasons');
			$table->foreign('users_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pqrs_logs', function(Blueprint $table)
		{
			$table->dropForeign('pqrs_logs_pqrs_id_foreign');
			$table->dropForeign('pqrs_logs_pqrs_location_id_foreign');
			$table->dropForeign('pqrs_logs_pqrs_log_reason_id_foreign');
			$table->dropForeign('pqrs_logs_users_id_foreign');
		});
	}

}
