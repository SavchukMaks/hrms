<?php

use Illuminate\Database\Seeder;
use App\Models\Status_Candidate;

class StatusCandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('status_candidate')->truncate();

        Status_Candidate::updateOrCreate(
            [
                'status' => "Filed for consideration by the vacancy"
            ]

        );

        Status_Candidate::updateOrCreate(
            [
                'status' => "Filed for consideration by the vacancy"
            ]
        );

        Status_Candidate::updateOrCreate(
            [
                'status' => "Filed for consideration by the vacancy"
            ]
        );

        Status_Candidate::updateOrCreate(
            [
                'status' => "Appointed an interview"
            ]
        );

        Status_Candidate::updateOrCreate(
            [
                'status' => "Considered"
            ]
        );

        Status_Candidate::updateOrCreate(
            [
                'status' => "Send offer офер"
            ]
        );

        Status_Candidate::updateOrCreate(
            [
                'status' => "Declined"
            ]
        );
        Status_Candidate::updateOrCreate(
            [
                'status' => "Passed Interview"
            ]
        );

    }
}
