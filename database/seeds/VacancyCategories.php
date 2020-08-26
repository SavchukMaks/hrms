<?php

use Illuminate\Database\Seeder;

class VacancyCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('VacancyCategories')->truncate();

        \App\Models\VacancyCategory::updateOrCreate(
            [
                'title' => 'php',
            ]
        );

        \App\Models\VacancyCategory::updateOrCreate(
            [
                'title' => 'js',
            ]
        );

        \App\Models\VacancyCategory::updateOrCreate(
            [
                'title' => 'pyton',
            ]
        );

        \App\Models\VacancyCategory::updateOrCreate(
            [
                'title' => 'C',
            ]
        );

        \App\Models\VacancyCategory::updateOrCreate(
            [
                'title' => 'C#',
            ]
        );
    }
}
