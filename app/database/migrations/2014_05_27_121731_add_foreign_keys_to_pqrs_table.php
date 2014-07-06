<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPqrsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pqrs', function(Blueprint $table)
		{
			$table->foreign('users_id')->references('id')->on('users');
			$table->foreign('members_id')->references('id')->on('members');
			$table->foreign('pqrs_types_id')->references('id')->on('pqrs_types');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pqrs', function(Blueprint $table)
		{
			$table->dropForeign('pqrs_users_id_foreign');
			$table->dropForeign('pqrs_members_id_foreign');
			$table->dropForeign('pqrs_pqrs_types_id_foreign');
		});
	}

}
