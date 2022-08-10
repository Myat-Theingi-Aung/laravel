<?php

namespace App\Contracts\Services\Song;

use Illuminate\Support\Facades\Request;

interface SongServiceInterface
{
    public function index();
	public function store(Request $request);
	public function destroy($id);
    public function edit($id);
    public function update(Request $request,$id);
}