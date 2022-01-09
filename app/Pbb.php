<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pbb extends Model
{
    protected $table = 'pbb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'NOP',
        'NM_WP_SPPT',
        'TOTAL_LUAS_BUMI',
        'NJOP_BUMI_SPPT',
        'TOTAL_LUAS_BNG',
        'NJOP_BNG_SPPT',
        'ALM_OP',
        'rt_id',
        'rw_id',
        'ALM_WP',
        'PBB_TERHUTANG_SPPT',
        'TAHUN_SPPT',
        'KETERANGAN',
    ];
    
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
