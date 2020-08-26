<?php

namespace App\Http\Controllers\Vacancy;

use App\Http\Controllers\Controller;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App;

class WelcomeMessageCRUDController extends Controller
{


    public function view($id)
    {
        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $data = $welcomeMessageService->view($id);

        if(!$data)
        {
            return redirect('vacancy/welcome-messages');
        }

        return view('pages.welcome-message-view',['data' => $data]);
    }

    public function save(Request $request)
    {

        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $data = $welcomeMessageService->save($request->name, $request->type, $request->description);
        return response()
            ->json($data);

    }

    public function list()
    {
        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $data = $welcomeMessageService->list();

        $CandidateList = Candidate::paginate(5);
        foreach ($CandidateList as $item)
        {
            $Array[] =
                [
                'first_name'=> $item->first_name,
                'last_name' => $item->last_name,
                'candidateDictTypes' =>  $item->candidateDictTypes->first()
                ];
        }

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();

        return view('pages.welcome-message',['welcomeMessage' => $data, 'dataCandidate' => $Array,
                'typesCandidate' => $typesCandidate]);

    }

    public function search(Request $request)
    {
        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $result = $welcomeMessageService->resultByQuery($request->data);

        foreach ($result as $item) {

            $Array[] =  [
                'first_name'=> $item->first_name,
                'last_name' => $item->last_name,
                'candidateDictTypes' =>  $item->candidateDictTypes->first()
            ];

        }
        return response()->json( ['candidates' => $Array]);
    }


    public function delete(Request $request)
    {
        $result = [];

        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $dataDelete =  $welcomeMessageService->delete($request->welcomeMessage);

       if($dataDelete) {
           $result['success'] = true;

       } else {
           $result['error'] = true;
           $result['message'] = 'ERROR deleting data';

       }

        return response()
            ->json($result);
    }

    public function create($id)
    {
        return view('pages.welcome-message-edit',['id' => $id]);
    }

    public function edit(Request $request)
    {
        $welcomeMessageService = App::make('App\Services\WelcomeMessageService');
        $welcomeMessageService->update($request);

        return redirect('/vacancy/welcome-messages');

    }


}