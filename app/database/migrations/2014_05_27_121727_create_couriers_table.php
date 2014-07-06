<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouriersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('couriers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cities_id')->index('`fk_couriers_cities1_idx`');
			$table->string('comercial_name', 150);
			$table->string('legal_name', 254);
			$table->string('document', 20);
			$table->string('address_street_1', 45);
			$table->string('address_street_2', 45)->nullable();
			$table->string('address_number', 10);
			$table->string('address_sector', 45)->nullable();
			$table->string('address_description', 45)->nullable();
			$table->string('phone_1', 15);
			$table->string('ext_phone_1', 10)->nullable();
			$table->string('phone_2', 15)->nullable();
			$table->string('ext_phone_2', 10)->nullable();
			$table->string('email', 45)->nullable();
			$table->string('web', 45)->nullable();
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
		Schema::drop('couriers');
	}

}
