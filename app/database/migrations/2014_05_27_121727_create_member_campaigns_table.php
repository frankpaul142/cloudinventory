<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMemberCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member_campaigns', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('members_id')->index('`fk_member_campaigns_members1_idx`');
			$table->integer('campaigns_id')->index('`fk_member_campaigns_campaigns1_idx`');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('member_campaigns');
	}

}
