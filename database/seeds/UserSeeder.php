<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/* Create super user */
		DB::table('user')->insert([
			[
				'name' => 'Admin',
				'email' => 'admin@admin.com',
				'password' => Hash::make('password123'),
				'role_id' => config('constants.roles.admin')
			],
			[
				'name' => 'Student',
				'email' => '123456',
				'password' => Hash::make('password123'),
				'role_id' => config('constants.roles.student')
			]
		]);
	}
}
