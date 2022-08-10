<?php

namespace App\Dao\Join;

use App\Models\Singer;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Join\JoinDaoInterface;

class JoinDao implements JoinDaoInterface
{
    public function index()
    {
        $data = Singer::join('songs','songs.singer_id','=','singers.singer_id')->get(['singers.singer_name','songs.name','songs.writer_name','songs.type']);
        return $data;
    }
}