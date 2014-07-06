<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('comercial_name', 150);
			$table->string('legal_name', 254);
			$table->string('document', 20);
			$table->string('phone_1', 15);
			$table->string('extension_1', 10)->nullable();
			$table->string('phone_2', 15)->nullable();
			$table->string('extension_2', 10)->nullable();
			$table->string('email', 45);
			$table->string('web', 45)->nullable();
			$table->enum('person_type', array('natural','legal'))->default('natural');
			$table->enum('origin_type', array('national','foreign'))->default('national');
			$table->enum('taxpayer_type', array('accounting','no_acounting','special'));
			$table->string('work_days', 45)->nullable();
			$table->string('work_hours', 45)->nullable();
			$table->enum('status', array('active','inactive','pending'));
			$table->integer('user_logs_id')->nullable()->index('`fk_suppliers_user_logs1_idx`');
			$table->timestamps();
			$table->integer('cities_id')->index('`fk_suppliers_cities1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}
