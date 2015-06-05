<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('log_entries', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('image_id');
			$table->integer('album_id');
			$table->integer('ip_address_id');
			$table->integer('ban_id');
			$table->text('text');
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
		Schema::drop('log_entries');
	}

}
