<?php

namespace App\Contracts\Dao\Singer;

use Illuminate\Support\Facades\Request;

interface SingerDaoInterface
{
    public function index();
	public function store(Request $request);
	public function destroy($id);
    public function edit($id);
    public function update(Request $request,$id);
}