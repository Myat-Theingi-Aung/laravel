<?php

namespace App\Services\Join;

use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Join\JoinDaoInterface;
use App\Contracts\Services\Join\JoinServiceInterface;

class JoinService implements JoinServiceInterface
{
    private $joinDao;

    public function __construct(JoinDaoInterface $joinDao)
    {
        $this->joinDao = $joinDao;
    }

    public function index()
    {
        return $this->joinDao->index();
    }  
}