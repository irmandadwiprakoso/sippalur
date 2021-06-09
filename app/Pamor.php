<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pamor extends Model
{
    protected $table = 'laporanpamor';
    protected $fillable = [
        'tanggal',
        'kegiatan',
        'jumlah',
        'bidang',
        'keterangan',
        'rt_id',
        'rw_id',
        'foto',
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
