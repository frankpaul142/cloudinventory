<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePqrsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pqrs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->enum('status', array('pending','solved'))->default('pending');
			$table->integer('users_id')->nullable()->index('`fk_pqrs_users1_idx`');
			$table->integer('members_id')->nullable()->index('`fk_pqrs_members1_idx`');
			$table->integer('pqrs_types_id')->index('`fk_pqrs_pqrs_types1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pqrs');
	}

}
