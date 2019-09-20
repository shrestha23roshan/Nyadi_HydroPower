<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            [
                'role_id' => '1',
                'username' => 'nyatapol',
                'password' => bcrypt('ny@t@p0l#987'),
                'email' => 'nyatapol@gmail.com',
                'designation' => 'Super Admin',
                'is_active' => '1',
                'image_icon' => null,
                'remember_token' => str_random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'role_id' => '2',
                'username' => 'nyadihydropower',
                'password' => bcrypt('password12345'),
                'email' => null,
                'designation' => 'Admin',
                'is_active' => '1',
                'image_icon' => null,
                'remember_token' => str_random(60),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
