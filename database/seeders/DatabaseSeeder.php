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
				'logo' => getImageDefault(),
				'favicon' => getImageDefault(),
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

		DB::table('menus')->insert([
			[
				'name' => 'Menu main',
				'content' => '[{"id":1},{"id":2}]',
				'location' => 1,
				'status' => 1,
				'lang' => 1,
			]
		]);

		DB::table('menuitems')->insert([
			[
				'name' => 'Trang chủ',
				'slug' => '/',
				'type' => 3,
				'target' => 3,
				'menu_id' => 1,
				'created_at' => now(),
				'updated_at' => now(),
			],
			[
				'name' => 'Sản phẩm',
				'slug' => '/san-pham/',
				'type' => 3,
				'target' => 3,
				'menu_id' => 1,
				'created_at' => now(),
				'updated_at' => now(),
			]
		]);
	}
}
