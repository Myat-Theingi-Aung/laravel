<?php

namespace App\Dao\Singer;

use App\Models\Singer;
use Illuminate\Support\Facades\Request;
use App\Contracts\Dao\Singer\SingerDaoInterface;

/**
 * Data accessing object for post
 */
class SingerDao implements SingerDaoInterface
{
   /**
     * To get singer information
     * @return array $singer return singer information
     */ 
    public function index()
    {
        $singers = Singer::all();

        return $singers;
    }

    /**
     * To store singer information
     * @param Request $request request with inputs
     * @return Object $singer saved singer
     */
    public function store($request)
    {
        $singer = new Singer();
        $singer->name = $request['singer_name'];
        $singer->age = $request['age'];
        $singer->type = $request['type'];
        $singer->gender = $request['gender'];
        $singer->save();
        
        return $singer;
    }

    /**
     * To delete singer by id
     * @param string $id singer id
     */
    public function destroy($id)
    {
        $singer = Singer::findOrFail($id);
        if($singer){
            $singer->delete();
        }
    }

    /**
     * To store old value in edit page
     * @param string $id singer id
     * @return Object $singer Singer Object
     */
    public function edit($id)
    {
        $singer = Singer::findOrFail($id)->first();

        return $singer;
    }

    /**
     * To update singer by id
     * @param Request $request request with inputs
     * @param string $id singer id
     * @return Object $singer Singer Object
     */
    public function update($request,$id)
    {
        $singer =Singer::find($id);
        $singer->name = $request['singer_name'];
        $singer->age = $request['age'];
        $singer->type = $request['type'];
        $singer->gender = $request['gender'];
        $singer->update();

        return $singer;   
    }

}