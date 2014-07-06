<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCampaignGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('campaign_goals', function(Blueprint $table)
		{
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
		Schema::table('campaign_goals', function(Blueprint $table)
		{
			$table->dropForeign('campaign_goals_campaigns_id_foreign');
		});
	}

}
