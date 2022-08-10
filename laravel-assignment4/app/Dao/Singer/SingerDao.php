<?php

namespace App\Dao\Singer;

use App\Models\Singer;
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

    public function showData(){
        $data['singers'] = Singer::orderBy('singer_id','desc')->paginate(5);
        return $data;
    }
    public function storeData(Request $request)
    {
        $singer = new Singer();
        $singer->singer_name = $request['name'];
        $singer->age = $request['age'];
        $singer->type = $request['type'];
        $singer->gender = $request['gender'];
        $singer->save();
        return $singer;
    }
    public function updateData(Request $request){
        $record =array(
            'singer_name' => $request['name'],
            'age' => $request['age'],
            'type' => $request['type'],
            'gender' => $request['gender']
        );
        Singer::where('singer_id',$request['id'])->update($record);
    }
    public function editSinger(Request $request)
    {   
        $singer  = Singer::where('singer_id', $request->id)->first();
        return $singer;
    }
    public function destroySinger(Request $request)
    {
        $singer = Singer::where('singer_id',$request->singer_id)->delete();
        return $singer;
    }


}