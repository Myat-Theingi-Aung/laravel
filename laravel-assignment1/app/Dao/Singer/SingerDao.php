<?php

namespace App\Dao\Singer;

use App\Models\Singer;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Singer\SingerDaoInterface;

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

}