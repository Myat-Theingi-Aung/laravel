<?php

namespace App\Services\Song;

use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Song\SongDaoInterface;
use App\Contracts\Services\Song\SongServiceInterface;

class SongService implements SongServiceInterface
{
    private $songDao;

    public function __construct(songDaoInterface $songDao)
    {
        $this->songDao = $songDao;
    }

    public function index()
    {
        return $this->songDao->index();
    }

    public function create()
    {
        return $this->songDao->create();
    }

    public function store($validated)
    {
        return $this->songDao->store($validated);
    }

    public function destroy($id)
    {
        return $this->songDao->destroy($id);
    }

    public function edit($id)
    {
        return $this->songDao->edit($id);
    }

    public function update($validated,$id)
    {
        return $this->songDao->update($validated,$id);
    }

    
}