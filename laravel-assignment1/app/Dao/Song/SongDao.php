<?php

namespace App\Dao\Song;

use App\Models\Song;
use App\Models\Singer;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Song\SongDaoInterface;

class SongDao implements SongDaoInterface
{
    public function index()
    {
        $data = Singer::join('songs','songs.singer_id','=','singers.singer_id')->get(['songs.id','songs.name','songs.writer_name','songs.type','singers.singer_name','songs.created_at','songs.updated_at']);
        return $data;
    }

    public function create(){
        $data = Singer::join('songs','songs.singer_id','=','singers.singer_id')->get(['songs.id','songs.name','songs.writer_name','songs.type','singers.singer_name','singers.singer_id','songs.created_at','songs.updated_at']);
        $singers = Singer::all();
        return [$data,$singers];
    }

    public function store($validated){
        $song = new Song();
        $song->name = $validated['name'];
        $song->writer_name = $validated['writer_name'];
        $song->type = $validated['type'];
        $song->singer_id = $validated['singer_id'];
        $song->save();
        return $song;
    }

    public function destroy($id){
        $song = Song::where('id',$id);
        if($song){
            $song->delete();
        }
    }

    public function edit($id){
        $song = Song::where('id',$id)->first();
        return $song;
    }

    public function update($validated,$id){
        $record =array(
            'name' => $validated['name'],
            'writer_name' => $validated['writer_name'],
            'type' => $validated['type'],
            'singer_id' => $validated['singer_id']
        );
        return Song::where('id',$id)->update($record);
        
    }

}