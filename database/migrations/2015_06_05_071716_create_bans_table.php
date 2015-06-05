<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bans', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('ip_address_id');
			$table->string('reason');
			$table->string('notes');
			$table->dateTime('expires_at');
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
		Schema::drop('bans');
	}

}
