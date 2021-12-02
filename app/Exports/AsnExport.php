<?php

namespace App\Exports;

use App\Asn;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsnExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Asn::all();
    }
    public function map($asn): array
    {
        return [
            $asn->id,
            $asn->NIK,
            $asn->nama,
            $asn->pangkat->pangkat,
            $asn->golongan->golongan,
            $asn->jabatan->jabatan,
            $asn->tempat_lahir,
            $asn->tanggal_lahir,
            $asn->jeniskelamin->jeniskelamin,
            $asn->alamat,
            $asn->agama->agama,
            $asn->pendidikanpeg->pendidikanpeg,
            $asn->statuskawin->statuskawin,
            $asn->SK_Jabatan,
            $asn->no_rek,
            $asn->npwp,
            $asn->email,
            $asn->no_HP,
        ];
    }

    public function headings(): array
    {
        return [
            'NIP',
            'NIK',
            'Nama',
            'Pangkat',
            'Golongan',
            'Jabatan',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'Agama',
            'Pendidikan',
            'Status Kawin',
            'SK Jabatan',
            'Rekening BJB',
            'NPWP',
            'EMAIL',
            'No HP',
        ];
    }
}

