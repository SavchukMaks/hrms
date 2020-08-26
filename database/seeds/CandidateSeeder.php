<?php

use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('candidates')->truncate();

        \App\Models\Candidate::updateOrCreate(
            [
                'first_name' => 'Mike',
                'last_name' => 'Troc',
                'experience' => '5',
                'description' => 'description Mike',
                'required_position' => 'required_position Mike',
                'current_company' => 'current_company Mike',
                'current_company_position' => 'current_company_position Mike',
                'current_company_work_period' => \Carbon\Carbon::now()->timestamp,
                'current_company_join_time' => \Carbon\Carbon::now(),
                'is_company_candidate' => 1,
                'location_id' => 1,
                'skills' => 'php',
                'education' => 'University',
                'email' => 'savchukmak@gmail.com',
                'linkedin' => 'example-example-4a975a139',
                'facebook' => 'facebook.com/user'
            ]
        );

        \App\Models\Candidate::updateOrCreate(
            [
                'first_name' => 'Tom',
                'last_name' => 'Draob',
                'experience' => '6',
                'description' => 'description Tom',
                'required_position' => 'required_position Tom',
                'current_company' => 'current_company Tom',
                'current_company_position' => 'current_company_position Tom',
                'current_company_work_period' => \Carbon\Carbon::now()->timestamp,
                'current_company_join_time' => \Carbon\Carbon::now(),
                'is_company_candidate' => 1,
                'location_id' => 2,
                'skills' => 'php',
                'education' => 'University',
                'email' => 'savchukmaks@gmail.com',
                'linkedin' => 'example-example-4a975a139',
                'facebook' => 'facebook.com/user'
            ]
        );

        \App\Models\Candidate::updateOrCreate(
            [
                'first_name' => 'Stiv',
                'last_name' => 'Arm',
                'experience' => '2',
                'description' => 'description Stiv',
                'required_position' => 'required_position Stiv',
                'current_company' => 'current_company Stiv',
                'current_company_position' => 'current_company_position Stiv',
                'current_company_work_period' => \Carbon\Carbon::now()->timestamp,
                'current_company_join_time' => \Carbon\Carbon::now(),
                'is_company_candidate' => 1,
                'location_id' => 3,
                'skills' => 'php',
                'education' => 'University',
                'email' => 'savchkmaks@gmail.com',
                'linkedin' => 'example-example-4a975a139',
                'facebook' => 'facebook.com/user'
            ]
        );

        \App\Models\Candidate::updateOrCreate(
            [
                'first_name' => 'Red',
                'last_name' => 'Alext',
                'experience' => '1',
                'description' => 'description Red',
                'required_position' => 'required_position Red',
                'current_company' => 'current_company Red',
                'current_company_position' => 'current_company_position Red',
                'current_company_work_period' => \Carbon\Carbon::now()->timestamp,
                'current_company_join_time' => \Carbon\Carbon::now(),
                'is_company_candidate' => 1,
                'location_id' => 4,
                'skills' => 'php',
                'education' => 'University',
                'email' => 'savchukmks@gmail.com',
                'linkedin' => 'example-example-4a975a139',
                'facebook' => 'facebook.com/user'
            ]
        );

        \App\Models\Candidate::updateOrCreate(
            [
                'first_name' => 'Blay',
                'last_name' => 'Fert',
                'experience' => '15',
                'description' => 'description Blay',
                'required_position' => 'required_position Blay',
                'current_company' => 'current_company Blay',
                'current_company_position' => 'current_company_position Blay',
                'current_company_work_period' => \Carbon\Carbon::now()->timestamp,
                'current_company_join_time' => \Carbon\Carbon::now(),
                'is_company_candidate' => 1,
                'location_id' => 5,
                'skills' => 'php',
                'education' => 'University',
                'email' => 'sachukmaks@gmail.com',
                'linkedin' => 'example-example-4a975a139',
                'facebook' => 'facebook.com/user'
            ]
        );
    }
}
