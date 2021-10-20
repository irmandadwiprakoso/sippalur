<?php

namespace App\Exports;

use App\Ksbrt;
use Maatwebsite\Excel\Concerns\FromCollection;

class KSBRTExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ksbrt::all();
    }
}
