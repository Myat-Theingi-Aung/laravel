<?php

namespace App\Http\Controllers\Singer;

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SingerRequest;
use App\Contracts\Services\Singer\SingerServiceInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SingersImport;
use App\Exports\SingersExport;

class SingerController extends Controller
{

    private $singerInterface;

    public function __construct(SingerServiceInterface $singerInterface)
    {
        $this->singerInterface = $singerInterface;
    }

    public function index(Request $request){
        $singers = $this->singerInterface->index($request);
        return view('singer.index',compact('singers'));
    }
    
    public function create(){
        return view('singer.create');
    }

    public function store(SingerRequest $request){
        $validated = $request->validated();
        $singer = $this->singerInterface->store($validated);
        return redirect()->route('singer.index')->with('status',"singer is created");
    }

    public function destroy($id){
        $singer = $this->singerInterface->destroy($id);
        return redirect()->route('singer.index')->with('status','singer is deleted');
    }

    public function edit($id){
        $singer = $this->singerInterface->edit($id);
        return view('singer.edit',compact('singer'));
    }

    public function update(SingerRequest $request,$id){
        $validated = $request->validated();
        $singer = $this->singerInterface->update($validated,$id);
        return redirect()->route('singer.index')->with('status','singer is updated');
    }

    public function excel(){
        return view('excel.excel');
    }

    public function import(Request $request){
        $singer = $this->singerInterface->import($request);
        return back();
    }

    public function export(){
        return Excel::download(new SingersExport,'singes.xlsx');
    }
}
