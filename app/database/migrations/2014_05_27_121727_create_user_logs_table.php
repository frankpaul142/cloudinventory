<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_logs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('users_id')->index('`fk_logs_users1_idx`');
			$table->string('model', 45)->nullable();
			$table->string('action', 45)->nullable();
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
		Schema::drop('user_logs');
	}

}
