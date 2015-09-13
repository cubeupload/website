<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTableFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('username')->after('name');
			$table->string('registration_ip')->nullable();
			$table->char('level', 1)->default(1)->after('username');
			$table->string('email')->nullable()->change();
			$table->string('legacy_password');
			$table->integer('legacy_user_id');
			$table->boolean('new_import');
			$table->dropUnique('users_email_unique');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('username');
			$table->dropColumn('level');
			$table->dropColumn('registration_ip');
			$table->dropColumn('legacy_password');
			$table->dropColumn('legacy_user_id');
			$table->dropColumn('new_import');
		});
	}

}
