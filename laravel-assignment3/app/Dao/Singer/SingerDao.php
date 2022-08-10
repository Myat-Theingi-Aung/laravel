<?php

namespace App\Dao\Singer;

use App\Models\Singer;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Contracts\Dao\Singer\SingerDaoInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SingersImport;
use App\Exports\SingersExport;
use Carbon\Carbon;

class SingerDao implements SingerDaoInterface
{
    public function index(Request $request)
    {
        if($request->has('name') || $request->has('age') || $request->has('start_date') || $request->has('end_date')){
            $singers = Singer::all();
            if ($request['name'] != null || $request['age'] != null) {
                $singers = Singer::where('singer_name','LIKE','%'.$request->name.'%')
                ->where('age','LIKE','%'.$request->age.'%')->get();
            }
            if ($request['start_date'] != null) {
                $singers = $singers->where('created_at', '>=', Carbon::createFromFormat('Y-m-d', $request->start_date))->values();
            }
            if ($request['end_date'] != null) {
                $singers = $singers->where('created_at', '<=', Carbon::createFromFormat('Y-m-d', $request->end_date))->values();
            }

            //dd($singers['singer_name']);
            return $singers;
        }else{
            $singers = Singer::all(); 
            return $singers;
        }
    }

    public function store($validated){
        $singer = new Singer();
        $singer->singer_name = $validated['singer_name'];
        $singer->age = $validated['age'];
        $singer->type = $validated['type'];
        $singer->gender = $validated['gender'];
        $singer->save();
        return $singer;
    }

    public function destroy($id){
        $singer = Singer::where('singer_id',$id);
        if($singer){
            $singer->delete();
        }
    }

    public function edit($id){
        $singer = Singer::where('singer_id',$id)->first();
        return $singer;
    }

    public function update($validated,$id){
        $record =array(
            'singer_name' => $validated['singer_name'],
            'age' => $validated['age'],
            'type' => $validated['type'],
            'gender' => $validated['gender']
        );
        return Singer::where('singer_id',$id)->update($record);   
    }

    public function import(Request $request){
        $file = $request->file('file');
        return Excel::import(new SingersImport , $file);
    }

}