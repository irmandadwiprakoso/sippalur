<?php

namespace App\Exports;

use App\Tkk;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TkkExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tkk::all();
    }

    public function map($tkk): array
    {
        return [
            $tkk->id,
            $tkk->KK,
            $tkk->nama,
            $tkk->tempat_lahir,
            $tkk->tanggal_lahir,
            $tkk->jeniskelamin->jeniskelamin,
            $tkk->alamat,
            $tkk->agama->agama,
            $tkk->pendidikanpeg->pendidikanpeg,
            $tkk->statuskawin->statuskawin,
            $tkk->seksi->seksi,
            $tkk->jabatan->jabatan,
            $tkk->SK_Tkk,
            $tkk->no_rek,
            $tkk->npwp,
            $tkk->email,
            $tkk->no_HP,
        ];
    }

    public function headings(): array
    {
        return [
            'NIK',
            'KK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Agama',
            'Pendidikan',
            'Status Kawin',
            'Seksi',
            'Jabatan',
            'SK TKK',
            'Rekening BJB',
            'NPWP',
            'email',
            'No HP',
        ];
    }
}

