<?php

namespace App\Exports;

use App\Pbb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PbbExport implements FromQuery, WithHeadings, WithMapping 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function query()
    {
        return Pbb::query();
    }

    public function map($pbb): array
    {
        return [
            $pbb->NOP,
            $pbb->NM_WP_SPPT,
            $pbb->TOTAL_LUAS_BUMI,
            $pbb->NJOP_BUMI_SPPT,
            $pbb->TOTAL_LUAS_BNG,
            $pbb->NJOP_BNG_SPPT,
            $pbb->ALM_OP,
            $pbb->rt->rt,
            $pbb->rw->rw,
            $pbb->ALM_WP,
            $pbb->PBB_TERHUTANG_SPPT,
            $pbb->TAHUN_SPPT,
            $pbb->KETERANGAN,
        ];
    }

    public function headings(): array
    {
        return [
            'NOP',
            'NM_WP_SPPT',
            'TOTAL_LUAS_BUMI',
            'NJOP_BUMI_SPPT',
            'TOTAL_LUAS_BNG',
            'NJOP_BNG_SPPT',
            'ALM_OP',
            'RT',
            'RW',
            'ALM_WP',
            'PBB_TERHUTANG_SPPT',
            'TAHUN_SPPT',
            'KETERANGAN',
        ];
    }
}
