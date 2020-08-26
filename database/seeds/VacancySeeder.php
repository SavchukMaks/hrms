<?php

use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vacancys')->truncate();

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'php',
                'requirements' => 'requirements php',
                'experience' => 5,
                'description' => 'description php',
                'profits' => 'profits php',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00001'
            ]
        );

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'java',
                'requirements' => 'requirements java',
                'experience' => 3,
                'description' => 'description java',
                'profits' => 'profits java',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00002'
            ]
        );

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'c++',
                'requirements' => 'requirements c++',
                'experience' => 5,
                'description' => 'description c++',
                'profits' => 'profits phc++p',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00003'
            ]
        );

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'Pascal',
                'requirements' => 'requirements Pascal',
                'experience' => 5,
                'description' => 'description Pascal',
                'profits' => 'profits Pascal',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00004'
            ]
        );

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'Basic',
                'requirements' => 'requirements Basic',
                'experience' => 5,
                'description' => 'description Basic',
                'profits' => 'profits Basic',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00005'
            ]
        );

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'Assembler',
                'requirements' => 'requirements Assembler',
                'experience' => 6,
                'description' => 'description Assembler',
                'profits' => 'profits Assembler',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00006'
            ]
        );

        \App\Models\Vacancy::updateOrCreate(
            [
                'title' => 'laravel',
                'requirements' => 'requirements laravel',
                'experience' => 8,
                'description' => 'description laravel',
                'profits' => 'profits laravel',
                'candidates' => 1,
                'applied' => 1,
                'offered' => 1,
                'interviewed' => 1,
                'accepted_candidate_id' => 1,
                'is_hot' => 1,
                'is_active' => 1,
                'work_period' => \Carbon\Carbon::now()->timestamp,
                'open_at' => \Carbon\Carbon::now(),
                'closed_at' => \Carbon\Carbon::now(),
                'unique_id' => '00013-00007'
            ]
        );

    }
}
