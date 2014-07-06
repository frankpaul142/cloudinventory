<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivot', function(Blueprint $table)
		{
			$table->integer('users_id')->index('`fk_pivot_users1_idx`');
			$table->integer('id');
			$table->integer('parent');
			$table->string('name', 45);
			$table->string('url', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pivot');
	}

}
