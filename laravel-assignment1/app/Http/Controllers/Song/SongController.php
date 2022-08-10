<?php

namespace App\Http\Controllers\Song;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Http\Requests\SongStoreRequest;
use App\Http\Requests\SongUpdateRequest;
use App\Contracts\Services\Song\SongServiceInterface;
use App\Models\Song;
use App\Models\Singer;

/**
 * This is Song controller.
 * This handles Song CRUD processing.
 */
class SongController extends Controller
{
    /**
     * song interface
     */
    private $songInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SongServiceInterface $songInterface)
    {
        $this->songInterface = $songInterface;
    }

     /**
     * To show song information
     * 
     * @return View index song
     */
    public function index()
    {
        $data = $this->songInterface->index();

        return view('song.index',compact('data'));
    }

    /**
     * To show create song view
     * 
     * @return View create song
     */
    public function create()
    {
        $data = $this->songInterface->create();
        $singers = Singer::all();

        return view('song.create',compact('data','singers'));
    }

    /**
     * To store song information
     * 
     * @return View index song
     */
    public function store(SongStoreRequest $request)
    {
        $song = $this->songInterface->store($request);

        return redirect()->route('song.index')->with('status',"Song create successfully");
    }

    /**
     * To delete song information
     * 
     * @return View index song
     */
    public function destroy($id)
    {
        $song = $this->songInterface->destroy($id);

        return redirect()->route('song.index')->with('status','Song delete successfully');
    }

    /**
     * To show song edit page
     * 
     * @return View index edit
     */
    public function edit($id)
    {
        $data = $this->songInterface->edit($id);
        $singers = Singer::all();

        return view('song.edit',compact('data','singers'));
    }

    /**
     * To update song information
     * 
     * @return View index song
     */
    public function update(SongUpdateRequest $request,$id)
    {
        $song = $this->songInterface->update($request,$id);
        
        return redirect()->route('song.index')->with('status','Song update successfully');
    }
}
