<?php

namespace App\Exports;

use App\Covid19;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Covid19Export implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Covid19::all();
    }
    public function map($covid19): array
    {
        return [
            $covid19->warga->NIK,
            $covid19->warga->nama,
            $covid19->warga->alamat_domisili,
            $covid19->warga->rt->rt,
            $covid19->warga->rw->rw,
            $covid19->konfirmasi,
            $covid19->status_pasien,
            $covid19->lokasi_pasien,
            $covid19->tanggal_status,
            $covid19->status_akhir,
            $covid19->tanggal_status_akhir,
            $covid19->no_hp,
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama Pasien',
            'Alamat',
            'RT',
            'RW',
            'Tanggal Konfirmasi',
            'Status Pasien',
            'Lokasi Pasien',
            'Tanggal Status',
            'Status Akhir',
            'Tanggal Status Akhir',
            'No HP',
        ];
    }
}
