<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignGoalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaign_goals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('campaigns_id')->index('`fk_campaign_goals_campaigns1_idx`');
			$table->integer('goal');
			$table->text('description')->nullable();
			$table->decimal('expected_goal', 11, 3);
			$table->decimal('weight_goal', 11, 3);
			$table->decimal('real_goal', 11, 3);
			$table->decimal('accomplish_goal', 11, 3);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campaign_goals');
	}

}
