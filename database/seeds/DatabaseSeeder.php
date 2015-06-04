<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
				'email' => 'staff@cubeupload.com',
				'name' => 'System Admin',
				'level' => 9,
				'password' => 'cubeupload'
			]
		);
	}
}