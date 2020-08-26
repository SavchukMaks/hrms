<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class SearchController extends Controller
{
    public function autocompleteSearch(Request $request)
    {
        $vacancyService = App::make('App\Services\VacancyService');
        $searchResult = $vacancyService->search($request);

        return $searchResult;

    }

    public function search(Request $request)
    {
        $this->validation($request);

        $vacancyService = App::make('App\Services\VacancyService');
        $data = $vacancyService->paginationSearch($request);

        $strSearch = $request->searchItem;

        return view('pages.vacancies-page', compact('data', 'strSearch'));

    }

    protected function validation($request)
    {
        $this->validate($request, [
            'searchItem' => 'required|min:3|max:255',
        ]);
    }

}
