<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Candidate;

class TestTaskService
{
    public function getList()
    {
        $testTaskList = Task::with('category', 'vacancy')->get();

        return $testTaskList;
    }

    public function updateData(Request $request)
    {
        $updateData = null;

        if($data = Task::where('id',$request['id']))
        {
            $updateData = $data->update(['title' => $request['name_message'], 'vacancy_type' => $request['type_vacancy'], 'description' => $request['welcome-message']]);

        }

        return $updateData;
    }

    public function update($id, Request $request)
    {
        $task = Task::findOrFail($id);

        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->skill = $request->get('skill');
        $task->vacancy_type = $request->get('vacancy_type');
        $task->vacancy_id = $request->get('vacancy_id');
        $task->category_id = $request->get('category_id');

        $task->save();
    }

    public  function getCandidates()
    {
        $candidate = null;

        if(Candidate::paginate(5))
        {
            $candidate = Candidate::paginate(5);

        }
        return  $candidate;
    }

    public function resultByQuery($item)
    {
        $welcomeMessage = null;
        if(Candidate::all()) {

            $welcomeMessage = Candidate::where('first_name', 'like', $item . '%')->paginate(5);
        }

        return $welcomeMessage;
    }

    public function create(Request $request)
    {
        $task = new Task();
        $task->title = $request->get('title');
        $task->description = $request->get('description');
        $task->vacancy_id = $request->get('vacancy_id');
        $task->category_id = $request->get('category_id');
        $task->skill = $request->get('skill');
        $task->vacancy_type = $request->get('vacancy_type');
        $task->save();
    }

    public function getView($id)
    {
        $testTaskView = Task::find($id);

        return $testTaskView;
    }

    public function delete($TestTaskId)
    {
        $TestTask = null;

        if(Task::where('id' , $TestTaskId)){

            $TestTask = Task::where('id' , $TestTaskId)->delete();
        }

        return $TestTask;
    }

    public function searchCandidates($item)
    {
        return Candidate::where('id', 'like', "%{$item}%")
            ->orWhere('email', 'like', "%{$item}%")
            ->orWhere('last_name', 'like', "%{$item}%")
            ->get();
    }
}