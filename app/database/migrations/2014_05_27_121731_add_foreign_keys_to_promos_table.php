<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPromosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('promos', function(Blueprint $table)
		{
			$table->foreign('entities_id')->references('id')->on('entities');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('promos', function(Blueprint $table)
		{
			$table->dropForeign('promos_entities_id_foreign');
		});
	}

}
