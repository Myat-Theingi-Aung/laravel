<?php

namespace App\Http\Controllers\Song;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Contracts\Services\Song\SongServiceInterface;
use App\Models\Song;
use App\Models\Singer;

class SongController extends Controller
{
    private $songInterface;

    public function __construct(SongServiceInterface $songInterface)
    {
        $this->songInterface = $songInterface;
    }

    public function index(){
        $data = $this->songInterface->index();
        return view('song.index',compact('data'));
    }

    public function create(){
        $data = $this->songInterface->create();
        $singers = Singer::all();
        return view('song.create',compact('data','singers'));
    }

    public function store(SongRequest $request){
        $validated = $request->validated();
        $song = $this->songInterface->store($validated);
        return redirect()->route('song.index')->with('status',"singer is created");
    }
    public function destroy($id){
        $song = $this->songInterface->destroy($id);
        return redirect()->route('song.index')->with('status','song is deleted');
    }
    public function edit($id){
        $data = $this->songInterface->edit($id);
        $singers = Singer::all();
        return view('song.edit',compact('data','singers'));
    }
    public function update(SongRequest $request,$id){
        $validated = $request->validated();
        $song = $this->songInterface->update($validated,$id);
        return redirect()->route('song.index')->with('status','song is updated');
    }
}
