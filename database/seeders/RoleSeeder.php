<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Admin Roles
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);

        //Create User Roles
        DB::table('roles')->insert([
            'name' => 'User',
        ]);
    }
}
