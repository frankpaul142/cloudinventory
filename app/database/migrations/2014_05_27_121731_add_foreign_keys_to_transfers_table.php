<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransfersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transfers', function(Blueprint $table)
		{
			$table->foreign('mile_transactions_id')->references('id')->on('mile_transactions');
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
		Schema::table('transfers', function(Blueprint $table)
		{
			$table->dropForeign('transfers_mile_transactions_id_foreign');
			$table->dropForeign('transfers_members_id_foreign');
		});
	}

}
