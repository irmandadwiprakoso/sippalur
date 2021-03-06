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
        'tinjut',
        'rt_id',
        'rw_id',
        'foto',
        'user_id',
    ];
    
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
