<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProfilePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('profile_pages', function(Blueprint $table)
		{
			$table->foreign('profiles_id')->references('id')->on('profiles');
			$table->foreign('pages_id')->references('id')->on('pages');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profile_pages', function(Blueprint $table)
		{
			$table->dropForeign('profile_pages_profiles_id_foreign');
			$table->dropForeign('profile_pages_pages_id_foreign');
		});
	}

}
