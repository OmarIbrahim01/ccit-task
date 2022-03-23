<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserPlanSubscription extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create User Subsription
        DB::table('user_plan_subscriptions')->insert([
            'user_id' => '3',
            'plan_id' => '1',
        ]);
    }
}
