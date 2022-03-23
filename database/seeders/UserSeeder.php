<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Create Admin User
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
            'role_id' => 1,
            'status' => 1,
        ]);

        //Create Normal User
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('user@123'),
            'role_id' => 2,
            'status' => 1,
        ]);

        //Create Normal User
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@user.com',
            'password' => Hash::make('user1@123'),
            'role_id' => 2,
            'status' => 1,
        ]);

        //Create Deactivated User
        DB::table('users')->insert([
            'name' => 'DUser',
            'email' => 'duser@user.com',
            'password' => Hash::make('duser@123'),
            'role_id' => 2,
            'status' => 0,
        ]);
    }
}
