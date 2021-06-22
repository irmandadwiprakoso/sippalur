<?php

namespace App\Imports;

use App\Warga;
use Maatwebsite\Excel\Concerns\ToModel;

class WargaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Warga([
            'NIK'     => $row[1],
            'nama'    => $row[3], 
            'rt_id'    => $row[7], 
            'rw_id'    => $row[8], 
        ]);
    }
}
