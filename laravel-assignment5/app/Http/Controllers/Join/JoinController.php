<?php

namespace App\Http\Controllers\Join;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\Join\JoinServiceInterface;

class JoinController extends Controller
{
    private $joinInterface;
    
    public function __construct(JoinServiceInterface $joinInterface)
    {
        $this->joinInterface = $joinInterface;
    }

    public function index(){
        $data = $this->joinInterface->index();
        return view('singer.singer-info',compact('data'));
    }
}
