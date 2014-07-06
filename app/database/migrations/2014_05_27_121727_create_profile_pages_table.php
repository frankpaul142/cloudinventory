<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profile_pages', function(Blueprint $table)
		{
			$table->integer('profiles_id')->index('`fk_profile_pages_profiles1_idx`');
			$table->integer('pages_id')->index('`fk_profile_pages_pages21_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profile_pages');
	}

}
