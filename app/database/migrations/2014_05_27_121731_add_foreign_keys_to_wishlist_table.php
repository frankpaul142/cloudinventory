<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWishlistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wishlist', function(Blueprint $table)
		{
			$table->foreign('detailed_products_id')->references('id')->on('detailed_products');
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
		Schema::table('wishlist', function(Blueprint $table)
		{
			$table->dropForeign('wishlist_detailed_products_id_foreign');
			$table->dropForeign('wishlist_members_id_foreign');
		});
	}

}
