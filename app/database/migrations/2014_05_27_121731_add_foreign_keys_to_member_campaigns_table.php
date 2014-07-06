<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMemberCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('member_campaigns', function(Blueprint $table)
		{
			$table->foreign('members_id')->references('id')->on('members');
			$table->foreign('campaigns_id')->references('id')->on('campaigns');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('member_campaigns', function(Blueprint $table)
		{
			$table->dropForeign('member_campaigns_members_id_foreign');
			$table->dropForeign('member_campaigns_campaigns_id_foreign');
		});
	}

}
