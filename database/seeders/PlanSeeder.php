<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Monthly Plan
        DB::table('plans')->insert([
            'name' => 'Monthly',
            'slug ' => 'monthly',
            'stripe_plan' => 'Monthly',
            'stripe_id' => 'prod_C7nJSSXVMMIbvq',
            'cost' => '9.00',
            'description' => 'Monthly Plan',
        ]);

        //Create Yearly Plan
        DB::table('plans')->insert([
            'name' => 'Yearly',
            'slug ' => 'yearly',
            'stripe_plan' => 'Yearly',
            'stripe_id' => 'prod_C7nLs1v60FCTE7',
            'cost' => '99.00',
            'description' => 'Yearly Plan',
        ]);
    }
}
