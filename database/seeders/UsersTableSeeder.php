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
            'email'=> 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
            'role_id' => 1

        ]);

    }
}
