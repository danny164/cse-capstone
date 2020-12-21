<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'full_name' => 'Nguyễn Đức Mận',
            'email'=> 'man@duytan.edu.vn',
            'password' => bcrypt('12345678'),
            'is_active' => 1,
            'is_email_confirmed' => 1,
            'email_verified_at' => now(),
            'role_id' => 1

        ]);

    }
}
