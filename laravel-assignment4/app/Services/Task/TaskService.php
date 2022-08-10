<?php

namespace App\Services\Task;

use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    private $taskDao;

    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    public function create()
    {
        return $this->taskDao->create();
    }

    public function store($validated)
    {
        return $this->taskDao->store($validated);
    }

    public function destroy($id)
    {
        return $this->taskDao->destroy($id);
    }

    
}