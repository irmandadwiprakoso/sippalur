<?php

namespace App\Exports;

use App\Ibadah;
use Maatwebsite\Excel\Concerns\FromCollection;

class IbadahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ibadah::all();
    }
}
