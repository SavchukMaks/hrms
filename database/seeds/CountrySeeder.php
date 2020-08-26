<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->truncate();

        DB::table('countries')->insert(
            [
                [
                    'title'=>"Україна"
                ],
                [
                    'title'=>"Польща"
                ],
                [
                    'title'=>"Чехія"
                ]

            ]
        );
    }
}
