<?php

namespace App\Http\Controllers\Vacancy;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DomainParams\Candidates;

class CategoriesCRUDController extends Controller
{

    public function categories()
    {

        $vacancyService = App::make('App\Services\VacancyCategoryService');
        $data = $vacancyService->categories();

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return $data;
    }


    public function add(Request $request)
    {
        $data = $request->all();
        $vacancyService = App::make('App\Services\VacancyCategoryService');
        $vacancyService->addCategories($data['name-categories']);

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return redirect('/vacancy/categories');

    }
    public function edit(Request $request)
    {
        $vacancyCategoryService = App::make('App\Services\VacancyCategoryService');
        $vacancyCategoryService->update($request->input('categoriesId'),$request->input('name-categories'));

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return redirect('/vacancy/categories');
    }

    public function delete(Request $request)
    {
        $result = [];

        $CategoriesService = App::make('App\Services\VacancyCategoryService');
        $dataDelete =  $CategoriesService->delete($request->categoriesId);

        if($dataDelete) {
            $result['success'] = true;

        } else {
            $result['error'] = true;
            $result['message'] = 'ERROR deleting data';

        }

        return response()
            ->json($result);
    }

    public function view()
    {
        $vacancyService = App::make('App\Services\VacancyCategoryService');
        $data = $vacancyService->getCategoriesList();

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return view('pages.vacancy.vacancies-page-categories',['categories' => $data]);
    }
}