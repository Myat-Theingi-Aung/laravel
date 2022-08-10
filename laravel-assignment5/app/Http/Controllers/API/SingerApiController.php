<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use App\Contracts\Services\Singer\SingerServiceInterface;
use Illuminate\Http\Request;

class SingerApiController extends Controller
{
    private $singerInterface;

    public function __construct(SingerServiceInterface $singerInterface)
    {
        $this->singerInterface = $singerInterface;
    }

    public function showData(){
        $singers = $this->singerInterface->showData();
        return view('singer.singer-crud',$singers);
    }

    public function storeData(Request $request)
    {
        $singers = $this->singerInterface->storeData($request);
        return response()->json(['success' => true]);
    }

    public function updateData(Request $request)
    {
        $singers = $this->singerInterface->updateData($request);
        return response()->json(['success' => true]);
    }

    public function editSinger(Request $request)
    {   
        $singer = $this->singerInterface->editSinger($request);
        return response()->json(['singer' => $singer]);
    }

    public function destroySinger(Request $request)
    {
        $singers = $this->singerInterface->destroySinger($request);
        return response()->json(['success' => true]);
    }
}
