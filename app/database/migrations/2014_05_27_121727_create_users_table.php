<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('profiles_id')->index('`fk_users_profiles1_idx`');
			$table->string('display_name', 150);
			$table->boolean('is_online');
			$table->string('email', 85)->unique('`email_UNIQUE`');
			$table->string('password', 15);
			$table->enum('status', array('active','inactive'))->default('active');
			$table->string('created_at', 45)->nullable();
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
		Schema::drop('users');
	}

}
