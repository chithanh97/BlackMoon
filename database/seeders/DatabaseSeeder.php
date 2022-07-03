<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		DB::table('admins')->insert([
			[
				'name' => 'Admin',
				'email' => 'admin@gmail.com',
				'password' => bcrypt('admin123'),
			]
		]);

		DB::table('users')->insert([
			[
				'name' => 'User',
				'email' => 'user@gmail.com',
				'password' => bcrypt('admin123'),
			]
		]);
		DB::table('config')->insert([
			[
				'name' => 'BlackMoon',
				'logo' => '',
				'favicon' => '',
				'domain' => '',
				'monney' => '',
				'title' => '',
				'description' => '',
				'keyword' => '',
				'ua' => '',
				'pixcel' => '',
				'ga' => '',
				'mailserver' => '',
				'passserver' => '',
				'certificate' => '',
				'phone' => '',
				'hotline' => '',
				'email' => '',
				'address' => '',
				'headcode' => '',
				'bodycode' => '',
			]
		]);
	}
}
