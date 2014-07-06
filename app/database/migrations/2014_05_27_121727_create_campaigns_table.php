<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campaigns', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('campaign_types_id')->index('`fk_campaigns_campaign_types1_idx`');
			$table->text('description')->nullable();
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->text('main_objective');
			$table->text('general_information')->nullable();
			$table->string('contact_first_name', 65);
			$table->string('contact_last_name', 65);
			$table->string('contact_email', 45);
			$table->string('contact_description', 45);
			$table->decimal('budget', 11, 3);
			$table->integer('accomplish_budget');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campaigns');
	}

}
