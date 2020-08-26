<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('locations')->truncate();

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 1,
                'country_id' => 1
            ]

        );

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 2,
                'country_id' => 1
            ]
        );

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 3,
                'country_id' => 1
            ]
        );

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 4,
                'country_id' => 2
            ]
        );

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 5,
                'country_id' => 2
            ]
        );

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 6,
                'country_id' => 3
            ]
        );

        \App\Models\Location::updateOrCreate(
            [
                'city_id' => 7,
                'country_id' => 3
            ]
        );

    }
}
