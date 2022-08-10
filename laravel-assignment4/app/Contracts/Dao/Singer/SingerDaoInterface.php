<?php

namespace App\Contracts\Dao\Singer;

use Illuminate\Http\Request;

interface SingerDaoInterface
{
    public function index(Request $request);
	public function store(Request $request);
	public function destroy($id);
    public function edit($id);
    public function update(Request $request,$id);
    public function import(Request $request);
    public function showData();
    public function storeData(Request $request);
    public function updateData(Request $request);
    public function editSinger(Request $request);
    public function destroySinger(Request $request);

}