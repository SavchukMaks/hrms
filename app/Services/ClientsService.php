<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\UserProfile;
use App\Models\User;
use App\DomainParams\Users;

class ClientsService
{


    public function addClient(Request $request){
        $date = $request->all();

        $client = new Clients();
        $clientDate = array('email' => $date['email'],
                             'password' => bcrypt($date['password']),
                             'role' => 'Client'
        );
        $client->fill($clientDate);
        $client->save();


        $userProfile = new UserProfile();
        $userDate = array('firstname' => $date['firstname'],
                          'lastname' => $date['lastname'],
                          'user_id' => $client->id
        );
        $userProfile->fill($userDate);
        $userProfile->save();

        return $client;
    }

    public function getList()
    {
        $clientList =  User::where('role' , 'Client')
            ->with('userProfile')
//            ->get()
//            ->toArray()
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Users::DEFAULT_COUNT_PAGINATION));

        return $clientList;
    }
}