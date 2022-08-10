<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Support\Facades\Request;

interface TaskDaoInterface
{
	public function create();

	public function store(Request $request);

	public function destroy($id);

}