<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMileTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mile_transactions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('transactions_id')->index('`fk_mile_transactions_transactions1_idx`');
			$table->enum('type', array('acreditation','redemption','purchase','transfer_send','transfer_receive','adjustment'));
			$table->enum('movement', array('c','d'));
			$table->integer('miles_amount');
			$table->enum('status', array('aproved','reverse'))->default('aproved');
			$table->string('created_at', 45);
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
		Schema::drop('mile_transactions');
	}

}
