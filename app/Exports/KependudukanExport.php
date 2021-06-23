<?php

namespace App\Exports;

use App\Kependudukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KependudukanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kependudukan::all();
    }
    public function map($kependudukan): array
    {
        return [
            $kependudukan->rt->rt,
            $kependudukan->rw->rw,
            $kependudukan->KK,
            $kependudukan->Laki_laki,
            $kependudukan->Perempuan,
        ];
    }

    public function headings(): array
    {
        return [
            'RT',
            'RW',
            'KK',
            'Laki-laki',
            'Perempuan',
        ];
    }
}
