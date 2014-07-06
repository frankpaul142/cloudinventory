<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cities_id')->index('`fk_members_cities1_idx`');
			$table->string('first_name_1', 45);
			$table->string('first_name_2', 45)->nullable();
			$table->string('last_name_1', 45);
			$table->string('last_name_2', 45)->nullable();
			$table->string('document', 20);
			$table->enum('person_type', array('natural','legal'))->default('natural');
			$table->enum('gender', array('m','f'))->nullable();
			$table->dateTime('birth_date')->nullable();
			$table->string('email', 45)->unique('`email_UNIQUE`');
			$table->string('password', 45);
			$table->string('phone_1', 15);
			$table->string('extension_1', 10)->nullable();
			$table->string('phone_2', 15)->nullable();
			$table->string('extension_2', 10)->nullable();
			$table->string('mobile_number', 20)->nullable();
			$table->enum('status', array('active','inactive'))->default('active');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
