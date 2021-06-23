<?php

namespace App\Exports;

use App\Covid19;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class Covid19Export implements FromQuery, WithHeadings, WithMapping 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function query()
    {
        return Covid19::query();
    }

    public function headings(): array
    {
        return [
            'updated_at',
            'NIK',
            'KK',
            'Nama Pasien',
            'Status Hubungan Keluarga',
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

    public function map($covid19): array
    {
        return [
            $covid19->updated_at,
            $covid19->warga->NIK,
            $covid19->warga->KK,
            $covid19->warga->nama,
            $covid19->warga->hub_keluarga,
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
 
}
