<?php

namespace App\Dao\Song;

use App\Models\Song;
use App\Models\Singer;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Song\SongDaoInterface;

/**
 * Data accessing object for post
 */
class SongDao implements SongDaoInterface
{
    /**
     * To get song information
     * @return array $song return song information
     */ 
    public function index()
    {
        $data = Singer::join('songs','songs.singer_id','=','singers.id')->get(['songs.id','songs.song_name','songs.writer_name','songs.type','singers.name','songs.created_at','songs.updated_at']);
        
        return $data;
    }

    /**
     * To get song and singer information
     * @return array $data return song information, $singer return singer information
     */
    public function create()
    {
        $data = Singer::join('songs','songs.singer_id','=','singers.id')->get(['songs.id','songs.song_name','songs.writer_name','songs.type','singers.name','singers.id','songs.created_at','songs.updated_at']);
        $singers = Singer::all();
        
        return [$data,$singers];
    }

    /**
     * To store song information
     * @param Request $request request with inputs
     * @return Object $song saved song
     */
    public function store($request)
    {
        $song = new Song();
        $song->song_name = $request['name'];
        $song->writer_name = $request['writer_name'];
        $song->type = $request['type'];
        $song->singer_id = $request['singer_id'];
        $song->save();
        return $song;
    }

    /**
     * To delete song by id
     * @param string $id song id
     */
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        if($song){
            $song->delete();
        }
    }

    /**
     * To store old value in edit page
     * @param string $id song id
     * @return Object $song Song Object
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id)->first();
        return $song;
    }

    /**
     * To update song by id
     * @param Request $request request with inputs
     * @param string $id song id
     * @return Object $song Song Object
     */
    public function update($request,$id)
    {
        $song = Song::find($id);
        $song->song_name = $request['name'];
        $song->writer_name = $request['writer_name'];
        $song->type = $request['type'];
        $song->singer_id = $request['singer_id'];
        $song->update();

        return $song;
        
    }

}