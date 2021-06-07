<?php

namespace App\Exports;

use App\Fasosfasum;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FasosfasumExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fasosfasum::all();
    }
    public function map($fasosfasum): array
    {
        return [
            $fasosfasum->nama,
            $fasosfasum->alamat,
            $fasosfasum->rt->rt,
            $fasosfasum->rw->rw,
            $fasosfasum->koordinat,
            $fasosfasum->luas,
            $fasosfasum->pemanfaatan,
            $fasosfasum->nama_pengembang,
            $fasosfasum->nama_perumahan,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Alamat',
            'RT',
            'RW',
            'Koordinat',
            'Luas (m2)',
            'Pemanfaatan',
            'Nama Pengembang',
            'Nama Perumahan',
        ];
    }
}
