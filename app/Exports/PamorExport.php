<?php

namespace App\Exports;

use App\Pamor;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PamorExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pamor::all();
    }

    public function map($laporanpamor): array
    {
        return [
            $laporanpamor->tanggal,
            $laporanpamor->kegiatan,
            $laporanpamor->jumlah,
            $laporanpamor->bidang,
            $laporanpamor->keterangan,
            $laporanpamor->tinjut,
            $laporanpamor->rt->rt,
            $laporanpamor->rw->rw,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal Kegiatan',
            'Uraian Kegiatan',
            'Jumlah Volume Kegiatan',
            'Bidang Volume Kegiatan',
            'Keterangan',
            'Tindak Lanjut',
            'RT',
            'RW',
        ];
    }

}
