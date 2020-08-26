<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(CountrySeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(VacancySeeder::class);
        $this->call(VacancyLocationSeeder::class);
        $this->call(DictCandidateTypesSeeder::class);
        $this->call(BalancesSeeder::class);
        $this->call(UserProfilesSeeder::class);
        $this->call(VacancysCustomers::class);
        $this->call(VacancyCategories::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }

}
