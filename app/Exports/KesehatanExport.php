<?php

namespace App\Exports;

use App\Kesehatan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KesehatanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kesehatan::all();
    }

    public function map($kesehatan): array
    {
        return [
            $kesehatan->nama_sarana_kesehatan,
            $kesehatan->Tipekesehatan->tipekesehatan,
            $kesehatan->alamat,
            $kesehatan->rt->rt,
            $kesehatan->rw->rw,
            $kesehatan->nama_pimpinan,
            $kesehatan->status_lahan,
            $kesehatan->no_hp,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Sarana Kesehatan',
            'Jenis Sarana Kesehatan',
            'Alamat',
            'RT',
            'RW',
            'Nama Dokter/Pimpinan',
            'Status Lahan',
            'No HP',
        ];
    }

}
