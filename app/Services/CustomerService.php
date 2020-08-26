<?php

namespace App\Services;

use App\Models\User;
use App\Models\Vacancy;
use App\Models\VacancyCustomer;
use App\DomainParams\Candidates;

class CustomerService
{

    public function getListVacancys(int $id)
    {
        $arrIdVacancys = $this->getIdVacancys($id);

        $vacancies = Vacancy::whereIn('id', $arrIdVacancys)->with('locations.country')
            ->with('locations.city')
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $vacancies;
    }

    public function getIdVacancys(int $id)
    {
        $arrId = array();
        $arrIdVacancys = VacancyCustomer::select('vacancy_id')->where('customer_id', '=', $id)->get()->toArray();
        $count = 0;
        foreach ($arrIdVacancys as $idVacancy) {
            $arrId[$count] = $idVacancy['vacancy_id'];
            $count++;
        }
        return $arrId;
    }

    public function getCustomer()
    {
        $user = User::where('role', 'Customer')->get();

        return $user;
    }

    public function search($request)
    {
        $customer = User::where('email','like','%'.$request.'%')->where('role','Customer')->get();

        return $customer;
    }

}