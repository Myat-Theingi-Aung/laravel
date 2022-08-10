<?php

namespace App\Contracts\Services\Singer;

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

interface SingerServiceInterface
{
    public function index(Request $request);
    public function create();
	public function store(Request $request);
	public function destroy($id);
    public function edit($id);
    public function update(Request $request,$id);
    public function import(Request $request);
}