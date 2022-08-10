<?php

namespace App\Http\Controllers\Task;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskController extends Controller
{
    private $taskInterface;

    public function __construct(TaskServiceInterface $taskInterface)
    {
        $this->taskInterface = $taskInterface;
    }

    public function create(){
        $tasks = $this->taskInterface->create();
        return view('task.tasks',compact('tasks'));
    }
    public function store(TaskRequest $request){
        $validated = $request->validated();
        $task = $this->taskInterface->store($validated);
        return redirect()->route('task.create')->with('status',"insert successfully!");
    }
    public function destroy($id){
        $task =  $this->taskInterface->destroy($id);
        return back()->with('status','Delete Successfully!');
    }
}


