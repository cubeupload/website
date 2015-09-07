<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notices', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id'); // author
			$table->string('title');
			$table->text('text');
			$table->enum('show_to', ['users', 'guests', 'admins', 'all']);
			$table->enum('style', ['success', 'info', 'warning', 'danger']);
			$table->integer('dismissable');
			$table->integer('metric'); // order
			$table->integer('visible'); // WIP or shown
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
		Schema::drop('notices');
	}

}
