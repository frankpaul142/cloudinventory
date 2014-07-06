<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMemberAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_adresses', function(Blueprint $table)
		{
			$table->foreign('members_id')->references('id')->on('members');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_adresses', function(Blueprint $table)
		{
			$table->dropForeign('member_adresses_members_id_foreign');
		});
	}

}
