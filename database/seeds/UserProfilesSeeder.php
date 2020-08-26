<?php

use Illuminate\Database\Seeder;

class UserProfilesSeeder extends Seeder
{

    public function run()
    {

        DB::table('user_profiles')->truncate();

        \App\Models\UserProfile::updateOrCreate(
            [
                'firstname' => 'Mike',
                'lastname' => 'Troc',
                'user_id' => '1',
                'birth_date' => \Carbon\Carbon::now(),
                'work_email' => 's1@ukr.net',
                'description' => 'description_1',
                'location_id' => '1',
                'balance_id' => '1',
            ]
        );

        \App\Models\UserProfile::updateOrCreate(
            [
                'firstname' => 'Mike_2',
                'lastname' => 'Troc_2',
                'user_id' => '2',
                'birth_date' => \Carbon\Carbon::now(),
                'work_email' => 's2@ukr.net',
                'description' => 'description_2',
                'location_id' => '2',
                'balance_id' => '2',
            ]
        );

        \App\Models\UserProfile::updateOrCreate(
            [
                'firstname' => 'Mike_3',
                'lastname' => 'Troc_3',
                'user_id' => '3',
                'birth_date' => \Carbon\Carbon::now(),
                'work_email' => 's3@ukr.net',
                'description' => 'description_1',
                'location_id' => '3',
                'balance_id' => '3',
            ]
        );

        \App\Models\UserProfile::updateOrCreate(
            [
                'firstname' => 'Mike_4',
                'lastname' => 'Troc_4',
                'user_id' => '4',
                'birth_date' => \Carbon\Carbon::now(),
                'work_email' => 's4@ukr.net',
                'description' => 'description_4',
                'location_id' => '4',
                'balance_id' => '4',
            ]
        );

        \App\Models\UserProfile::updateOrCreate(
            [
                'firstname' => 'Mike_5',
                'lastname' => 'Troc_5',
                'user_id' => '5',
                'birth_date' => \Carbon\Carbon::now(),
                'work_email' => 's5@ukr.net',
                'description' => 'description_5',
                'location_id' => '4',
                'balance_id' => '5',
            ]
        );

        \App\Models\UserProfile::updateOrCreate(
            [
                'firstname' => 'Mike_6',
                'lastname' => 'Troc_6',
                'user_id' => '6',
                'birth_date' => \Carbon\Carbon::now(),
                'work_email' => 's6@ukr.net',
                'description' => 'description_6',
            ]
        );

    }

}