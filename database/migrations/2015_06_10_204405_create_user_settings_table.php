<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->enum('short_urls', ['none', 'isgd', 'bitly'] )->default('bitly');
			$table->boolean('retain_filenames')->default(true);
			$table->boolean('embed_html_full')->default(false);
			$table->boolean('embed_html_thumb')->default(true);
			$table->boolean('embed_bbcode_full')->default(false);
			$table->boolean('embed_bbcode_thumb')->default(true);
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
		Schema::drop('user_settings');
	}

}
