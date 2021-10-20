<?php

namespace App\Exports;

use App\Ksbrw;
use Maatwebsite\Excel\Concerns\FromCollection;

class KSBRWExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ksbrw::all();
    }
}
