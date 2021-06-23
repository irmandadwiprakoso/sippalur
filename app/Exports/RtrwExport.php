<?php

namespace App\Exports;

use App\Rtrw;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RtrwExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rtrw::all();
    }

    public function map($rtrw): array
    {
        return [
            $rtrw->warga->NIK,
            $rtrw->warga->nama,
            $rtrw->jabatan->jabatan,
            $rtrw->rt->rt,
            $rtrw->rw->rw,
            $rtrw->no_sk,
            $rtrw->tmt,
            $rtrw->no_hp,
            $rtrw->no_rek,
            $rtrw->npwp,
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Jabatan',
            'RT',
            'RW',
            'No SK',
            'TMT',
            'No HP',
            'No Rekening BJB',
            'NPWP',
        ];
    }
}
