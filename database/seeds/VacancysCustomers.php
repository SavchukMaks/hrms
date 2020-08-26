<?php

use Illuminate\Database\Seeder;

class VacancysCustomers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacancys_customers')->truncate();

        DB::table('vacancys_customers')->insert(
            [
                [
                    'vacancy_id'=>1,
                    'customer_id'=>11
                ],
                [
                    'vacancy_id'=>2,
                    'customer_id'=>11
                ],
                [
                    'vacancy_id'=>3,
                    'customer_id'=>11
                ],
                [
                    'vacancy_id'=>4,
                    'customer_id'=>12
                ],
                [
                    'vacancy_id'=>1,
                    'customer_id'=>12
                ],

            ]
        );
    }
}
