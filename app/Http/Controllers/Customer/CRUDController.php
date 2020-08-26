<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App;
use Auth;
use Illuminate\Http\Request;

class CRUDController extends Controller
{

    public function listVacancys()
    {
        $customerService = App::make('App\Services\CustomerService');
        $customerId = Auth::user()->id;
        $customerVacancies = $customerService->getListVacancys($customerId);
        return view('pages.customer-vacancies-page',['data' => $customerVacancies]);
    }

    public function customerList()
    {
        $customerService = App::make('App\Services\CustomerService');
        $data = $customerService->getCustomer();

        return response()->json(['customer' => $data]);
    }

    public function search(Request $request)
    {
        $customerService = App::make('App\Services\CustomerService');
        $data = $customerService->search($request['data']);

        return response()->json(['customer' => $data]);
    }


}