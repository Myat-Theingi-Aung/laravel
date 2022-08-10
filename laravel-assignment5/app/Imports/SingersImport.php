<?php

namespace App\Imports;

use App\Models\Singer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SingersImport implements ToModel,WithHeadingRow
{

    public function model(array $row)
    {
        print_r($row);
        return new Singer([
           'singer_name' => $row['singer_name'],
           'age' => $row['age'],
           'type' => $row['type'],
           'gender' => $row['gender'],
        ]);

    }
}
