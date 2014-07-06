<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberAdressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_adresses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('members_id')->index('`fk_member_adresses_members1_idx`');
			$table->string('street_1', 45);
			$table->string('street_2', 45)->nullable();
			$table->string('number', 10);
			$table->string('sector', 45)->nullable();
			$table->string('description', 45)->nullable();
			$table->enum('status', array('active','inactive'))->nullable()->default('active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_adresses');
	}

}
