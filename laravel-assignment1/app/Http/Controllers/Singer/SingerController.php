<?php

namespace App\Http\Controllers\Singer;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SingerRequest;
use App\Http\Requests\SingerStoreRequest;
use App\Http\Requests\SingerUpdateRequest;
use App\Contracts\Services\Singer\SingerServiceInterface;

/**
 * This is Singer controller.
 * This handles Singer CRUD processing.
 */
class SingerController extends Controller
{
    /**
     * singer interface
     */
    private $singerInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SingerServiceInterface $singerInterface)
    {
        $this->singerInterface = $singerInterface;
    }

     /**
     * To show singer information
     * 
     * @return View index singer
     */
    public function index()
    {
        $singers = $this->singerInterface->index();

        return view('singer.index',compact('singers'));
    }
    
     /**
     * To show create singer view
     * 
     * @return View create singer
     */
    public function create()
    {
        return view('singer.create');
    }

    /**
     * To store singer information
     * 
     * @return View index singer
     */
    public function store(SingerStoreRequest $request)
    {
        $singer = $this->singerInterface->store($request);

        return redirect()->route('singer.index')->with('status',"Singer create successfully!");
    }

    /**
     * To delete singer information
     * 
     * @return View index singer
     */
    public function destroy($id)
    {
        $singer = $this->singerInterface->destroy($id);

        return redirect()->route('singer.index')->with('status','Singer delete successfully!');
    }

    /**
     * To show singer edit page
     * 
     * @return View index edit
     */
    public function edit($id)
    {
        $singer = $this->singerInterface->edit($id);

        return view('singer.edit',compact('singer'));
    }

    /**
     * To update singer information
     * 
     * @return View index singer
     */
    public function update(SingerUpdateRequest $request,$id)
    {
        $singer = $this->singerInterface->update($request,$id);
        
        return redirect()->route('singer.index')->with('status','Singer update successfully!');
    }
}
