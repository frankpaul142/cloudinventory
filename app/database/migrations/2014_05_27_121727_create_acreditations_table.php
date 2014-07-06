<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcreditationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acreditations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('mile_transactions_id')->index('`fk_acreditation_mile_transactions1_idx`');
			$table->integer('promo_id')->index('`fk_acreditation_promo1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('acreditations');
	}

}
