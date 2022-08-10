<?php

namespace App\Contracts\Dao\Singer;

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

interface SingerDaoInterface
{
    public function index(Request $request);
	public function store(Request $request);
	public function destroy($id);
    public function edit($id);
    public function update(Request $request,$id);
    public function import(Request $request);
}