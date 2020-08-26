<?php

use Illuminate\Database\Seeder;

class VacancyLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('location_vacancy')->truncate();

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '1',
                'location_id' => '1'
            ]
        );

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '1',
                'location_id' => '2'
            ]
        );

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '2',
                'location_id' => '2'
            ]
        );

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '2',
                'location_id' => '1'
            ]
        );

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '3',
                'location_id' => '3'
            ]
        );

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '3',
                'location_id' => '2'
            ]
        );

        \App\Models\VacancyLocation::updateOrCreate(
            [
                'vacancy_id' => '4',
                'location_id' => '4'
            ]
        );



    }
}
