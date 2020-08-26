<?php
/**
 * Created by PhpStorm.
 * User: fyshtey
 * Date: 14.03.18
 * Time: 13:57
 */

namespace App\Http\Controllers\Interview;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App;
use App\DomainParams\Candidates;
use App\Services\CandidateService;

class CRUDController extends Controller
{

    public function list($year = '', $month = '')
    {
        $interviewService = App::make('App\Services\InterviewService');
        $dataInterview = $interviewService->list($year, $month);

        $configData = ['candidateSearchAutocomplete' => Candidates::CANDIDATE_SEARCH_AUTOCOMPLETE];
        $configDataJson = json_encode($configData);

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        return view('pages.interview-calendar',
            [
                'data' => $dataInterview->appends(Input::except('page')),
                'configDataJson'=> $configDataJson,
            ]);
    }

    public function add(CandidateService $candidateService)
    {
        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        $configData = ['candidateSearchAutocomplete' => Candidates::CANDIDATE_SEARCH_AUTOCOMPLETE];
        $configDataJson = json_encode($configData);
        $dictVacancyService = App::make('App\Services\VacancyService');
        $vacancy = $dictVacancyService->getListAll();
        $candidates = $candidateService->getAllCandidates();

        return view('pages.interview-create',
            [
                'configDataJson'=> $configDataJson,
                'vacancy'=> $vacancy,
                'candidates' => $candidates,
            ]);
    }

    public function save()
    {
        $interviewService = App::make('App\Services\InterviewService');
        $interviewService->addInterview();
        return redirect('/interview/list');
    }

    public function delete($id)
    {
        $interviewService = App::make('App\Services\InterviewService');
        $interviewService->deleteInterview($id);
        return redirect('/interview/list');
    }

}