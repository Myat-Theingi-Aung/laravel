<?php

namespace App\Services\Singer;

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Contracts\Dao\Singer\SingerDaoInterface;
use App\Contracts\Services\Singer\SingerServiceInterface;

class SingerService implements SingerServiceInterface
{
    private $singerDao;

    public function __construct(SingerDaoInterface $singerDao)
    {
        $this->singerDao = $singerDao;
    }

    public function index(Request $request)
    {
        return $this->singerDao->index($request);
    }

    public function create()
    {
        return $this->singerDao->create();
    }

    public function store($validated)
    {
        return $this->singerDao->store($validated);
    }

    public function destroy($id)
    {
        return $this->singerDao->destroy($id);
    }

    public function edit($id)
    {
        return $this->singerDao->edit($id);
    }

    public function update($validated,$id)
    {
        return $this->singerDao->update($validated,$id);
    }

    public function import(Request $request){
        return $this->singerDao->import($request);
    }
}