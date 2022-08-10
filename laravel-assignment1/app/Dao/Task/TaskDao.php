<?php

namespace App\Dao\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;

class TaskDao implements TaskDaoInterface
{
    public function create()
    {
        $tasks=Task::all();
        return $tasks;
    }

    public function store($validated){
        $task = new Task();
        $task->name = $validated['name'];
        $task->save();
        return $task;
    }

    public function destroy($id){
        $task = Task::find($id);
        if($task){
            $task->delete();
        }
    }

}