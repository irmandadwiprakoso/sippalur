<?php

namespace App\Exports;

use App\Ibadah;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IbadahExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ibadah::all();
    }

    public function map($ibadah): array
    {
        return [
            $ibadah->nama_sarana_ibadah,
            $ibadah->Tipeibadah->tipeibadah,
            $ibadah->alamat,
            $ibadah->rt->rt,
            $ibadah->rw->rw,
            $ibadah->nama_pimpinan,
            $ibadah->status_lahan,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Sarana Peribadatan',
            'Jenis Sarana Peribadatan',
            'Alamat',
            'RT',
            'RW',
            'DKM/Pengurus/Pendeta',
            'Status Lahan',
        ];
    }
}
