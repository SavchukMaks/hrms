<?php


namespace App\Http\Controllers\Vacancy;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Task as TaskService;
use App\Models\Task;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Vacancy;
use App\Models\VacancyCategory;


class TestTaskCRUDController extends  Controller
{
    public function listCandidate(Request $request)
    {

        $welcomeMessageService = App::make('App\Services\TestTaskService');
        $result = $welcomeMessageService->resultByQuery($request->data);

        $Array=[];
        foreach ($result as $item) {

            $Array[] =  [
                'first_name'=> $item->first_name,
                'last_name' => $item->last_name,
                'candidateDictTypes' =>  $item->candidateDictTypes->first()
            ];

        }
        return response()->json( ['candidates' => $Array]);

    }

    public function add()
    {
        $vacancy = Vacancy::all();
        $category = VacancyCategory::all();

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();

        return view('pages.test-task-add', compact('vacancy', 'category', 'typesCandidate'));
    }

    public function create($id)
    {
        $task = Task::with('category', 'vacancy')->findOrFail($id);
        $vacancy = Vacancy::all();
        $category = VacancyCategory::all();
        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();
        return view('pages.test-task-edit', compact('id', 'task', 'vacancy', 'category', 'typesCandidate'));
    }

    public function update($id, Request $request)
    {
        $taskService = App::make('App\Services\TestTaskService');
        $taskService->update($id, $request);

        return redirect('/vacancy/test-tasks/list');
    }

    public function newTask(Request $request)
    {
        $taskService = App::make('App\Services\TestTaskService');
        $taskService->create($request);

        return redirect('/vacancy/test-tasks/list');
    }

    public function edit(Request $request)
    {
        $taskService = App::make('App\Services\TestTaskService');
        $taskService->updateData($request);

        return redirect('/vacancy/test-tasks/list');
    }

    public function list()
    {
        $TaskService = App::make('App\Services\TestTaskService');
        $data = $TaskService->getList();

        $result = $TaskService->getCandidates();

        $Array=[];
        foreach ($result as $item) {

            $Array[] =  [
                'first_name'=> $item->first_name,
                'last_name' => $item->last_name,
                'candidateDictTypes' =>  $item->candidateDictTypes->first()
            ];

        }

        return view('pages.test-task-list',['data' => $data, 'result' =>$Array]);

    }

    public function search(Request $request)
    {
        $testTaskService = App::make('App\Services\TestTaskService');
        $candidates = $testTaskService->searchCandidates($request->data);

        return response()->json( ['candidates' => $candidates]);
    }

    public function view($id)
    {
        $taskService = App::make('App\Services\TestTaskService');
        $data = $taskService->getView($id);
        if(!$data)
        {
            return redirect('vacancy/test-tasks/list');
        }
        return view('pages.test-task-view',['data' => $data]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete($id)
    {
        $task = Task::find($id);

        if (empty($task)) {
            throw new NotFoundHttpException('Task not found!');
        }

        $task->delete();

        return redirect('vacancy/test-tasks/list');
    }
}