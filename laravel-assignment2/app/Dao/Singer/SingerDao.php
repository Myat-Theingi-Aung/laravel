<?php

namespace App\Dao\Singer;

use App\Models\Singer;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Contracts\Dao\Singer\SingerDaoInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SingersImport;
use App\Exports\SingersExport;

class SingerDao implements SingerDaoInterface
{
    public function index()
    {
        $singers = Singer::all();
        return $singers;
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