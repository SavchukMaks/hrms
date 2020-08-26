<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Illuminate\Support\Facades\Auth;
use App\DomainParams\Candidates;

class CRUDController extends Controller
{
    public function create(Request $request)
    {
        $clientService = App::make('App\Services\ClientsService');
        $clientService->addClient($request);

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return redirect('/clients/list');
    }

    public function add()
    {

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return view('pages.add-clients');

    }

    public function redirect()
    {
        return redirect( route('client_add'));
    }

    public function list()
    {

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        $clientService = App::make('App\Services\ClientsService');
        $clientList  = $clientService->getList();

        return view('pages.clients.clients-list')->with('data', $clientList);
    }
}
