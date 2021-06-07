<?php

namespace App\Exports;

use App\Pendidikan;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendidikanExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendidikan::all();
    }

    public function map($pendidikan): array
    {
        return [
            $pendidikan->nama_sarana_pendidikan,
            $pendidikan->Tipependidikan->tipependidikan,
            $pendidikan->alamat,
            $pendidikan->rt->rt,
            $pendidikan->rw->rw,
            $pendidikan->nama_pimpinan,
            $pendidikan->status_lahan,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Sarana Pendidikan',
            'Jenis Sarana Pendidikan',
            'Alamat',
            'RT',
            'RW',
            'Nama Kepala Sekolah/Pimpinan',
            'Status Lahan',
        ];
    }
}
