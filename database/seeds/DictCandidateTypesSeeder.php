<?php

use Illuminate\Database\Seeder;

class DictCandidateTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('dict_candidate_types')->truncate();

        DB::table('dict_candidate_types')->insert(
            [
                ['title' => "developer"],
                ['title' => "qa"],
                ['title' => "backend"],
                ['title' => "frontend"],


            ]
        );
    }
}
