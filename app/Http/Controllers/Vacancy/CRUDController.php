<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App;
use App\Models\Vacancy;
use App\Services\VacancyDictTypeService;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CRUDController extends Controller
{

    public function view($id)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $dataCandidate = $candidateService->getCandidates($id);
        $configDataJson = $candidateService->getConfigData();

        return view('pages.vacancies-view',['data'=>$dataCandidate, 'id' => $id, 'configDataJson'=>$configDataJson]);
    }

    public function deleteCandidate(Request $request)
    {
        $result = [];
        $vacancyService = App::make('App\Services\VacancyService');
        $dataDelete =  $vacancyService->delete($request->candidate,$request->vacancyId);
        if($dataDelete) {
            $result['success'] = true;

        } else {
            $result['error'] = true;
            $result['message'] = 'ERROR deleting data';

        }

        return response()
            ->json(['result' => $result]);
    }

    public function edit($id)
    {

        $vacancyService = App::make('App\Services\VacancyService');
        $result = $vacancyService->getEditData($id);

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();

        $category = App\Models\VacancyCategory::all();

        return view('pages.vacancies-edit',$result, compact('category', 'typesCandidate'));
    }

    public function list($sort = '')
    {
        $vacancyService = App::make('App\Services\VacancyService');
        $dataVacancies = $vacancyService->getList($sort);
        $vacancyCategoryService = App::make('App\Services\VacancyCategoryService');

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();

        $categories = $vacancyCategoryService->categories();

        return view('pages.vacancies-page',
            [
                'data' => $dataVacancies->appends(Input::except('page')),
                'categories'=> $categories,
                'typesCandidate' => $typesCandidate
            ]);
    }


    public function listCandidatesToVacancies(Request $request)
    {

        $Array= [];

        $data = $request->all();

        $candidateService = App::make('App\Services\CandidateService');
        $dataCandidate = $candidateService->getCandidates($data['vacancyId']);

        foreach ($dataCandidate as $item) {

            $Array[] =  [
                'first_name'=> $item->first_name,
                'last_name' => $item->last_name,
                'candidateDictTypes' =>  $item->candidateDictTypes->first()
            ];

        }

        return response()->json([
            'candidates' => $Array
        ]);
    }

    public function create()
    {
        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();
        $category = $dictCandidateTypesService->getCategory();

        $clients = App\Models\User::where('role' , 'Client')->with('userProfile')->get();

        return view('pages.add-vacancy',['typesCandidate' => $typesCandidate, 'category' => $category, 'clients' => $clients]);
    }

    public function save(Request $request, VacancyDictTypeService $vacancyDictTypeService)
    {
        $vacancyService = App::make('App\Services\VacancyService');
        $vacancyService->addVacancy($request,$vacancyDictTypeService);
        return redirect('/vacancy/list');
    }

    public function show($uniqueId)
    {
        $vacancyIdService = App::make('App\Services\VacancyService');
        $dataVacancies = $vacancyIdService->getVacancyIdByUniqeId($uniqueId);

        return view('pages.vacancy.show-vacancy')
            ->with('vacancy', $dataVacancies);
    }

    public function updatesRemotely($id, Request $request)
    {
        $vacancyIdService = App::make('App\Services\VacancyService');
        $vacancyIdService->updatesRemotely($id, $request);

        return redirect()->route('vacancy_edit', ['id' => $id]);
    }

    public function updatesCategory($id, Request $request)
    {
        $vacancyIdService = App::make('App\Services\VacancyService');
        $vacancyIdService->updatesCategory($id, $request);

        return redirect()->route('vacancy_edit', ['id' => $id]);
    }

    public function updatesType($id, Request $request)
    {
        $vacancyIdService = App::make('App\Services\VacancyService');
        $vacancyIdService->updatesType($id, $request);

        return redirect()->route('vacancy_edit', ['id' => $id]);
    }

}
