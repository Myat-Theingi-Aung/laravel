<?php

namespace App\Contracts\Services\Task;

use Illuminate\Support\Facades\Request;

interface TaskServiceInterface
{
    public function create();

	public function store(Request $request);

	public function destroy($id);
}