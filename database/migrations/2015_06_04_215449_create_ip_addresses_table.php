<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ip_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('decimal', 16);
			$table->string('country', 30);
			$table->boolean('banned');
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
		Schema::drop('ip_addresses');
	}

}
