<?php

namespace App\Exports;

use App\Models\Singer;
use Maatwebsite\Excel\Concerns\FromCollection;

class SingersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $singer = Singer::select('name','age','gender')->get();
        return $singer;
    }
}
