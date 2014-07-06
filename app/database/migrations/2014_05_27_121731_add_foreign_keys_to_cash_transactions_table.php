<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCashTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cash_transactions', function(Blueprint $table)
		{
			$table->foreign('transactions_id')->references('id')->on('transactions');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cash_transactions', function(Blueprint $table)
		{
			$table->dropForeign('cash_transactions_transactions_id_foreign');
		});
	}

}
