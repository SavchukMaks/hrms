<?php

use Illuminate\Database\Seeder;

class BalancesSeeder extends Seeder
{
    public function run()
    {

        DB::table('balances')->truncate();

        \App\Models\Balance::updateOrCreate(
            [
                'user_profile_id' => '1',
                'sum' => '100.00',
            ]
        );

        \App\Models\Balance::updateOrCreate(
            [
                'user_profile_id' => '2',
                'sum' => '150.00',
            ]
        );

        \App\Models\Balance::updateOrCreate(
            [
                'user_profile_id' => '3',
                'sum' => '200.00',
            ]
        );

        \App\Models\Balance::updateOrCreate(
            [
                'user_profile_id' => '4',
                'sum' => '300.00',
            ]
        );
    }
}