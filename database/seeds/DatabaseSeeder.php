<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Notice;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('NoticeTableSeeder');
	}

}

class UserTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->delete();

		User::create(
			[
				'username' => 'sysadmin',
				'email' => 'sysadmin@cubeupload.com',
				'name' => 'System Admin',
				'level' => 9,
				'password' => 'cubeupload'
			]
		);
	}
}

class NoticeTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('notices')->delete();

		Notice::create(
			[
				'title' => 'New Install Notice',
				'text' => '<strong>Hi!</strong> This is a new install. Login as sysadmin@cubeupload.com with the password "cubeupload" to get started.',
				'style' => 'success',
				'show_to' => 'all',
				'visible' => 1,
				'dismissable' => 1,
				'metric' => 0
			]
		);
	}
}