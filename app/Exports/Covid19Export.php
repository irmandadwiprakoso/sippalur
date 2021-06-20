<?php

namespace App\Exports;

use App\Covid19;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

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
            $covid19->domisili,
            $covid19->rt->rt,
            $covid19->rw->rw,
            $covid19->konfirmasi,
            $covid19->status_pasien,
            $covid19->lokasi_pasien,
            $covid19->tanggal_status,
            $covid19->hasil_test,
            $covid19->status_akhir,
            $covid19->tanggal_status_akhir,
            $covid19->no_hp,
            $covid19->tinjut,
            $covid19->keterangan,
            $covid19->sumbercovid,
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
            'Hasil Test',
            'Status Akhir',
            'Tanggal Status Akhir',
            'No HP',
            'Tindak Lanjut',
            'Keterangan',
            'Asal Terpapar Covid',
        ];
    }
}

