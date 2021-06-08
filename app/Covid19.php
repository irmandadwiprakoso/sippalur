<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19 extends Model
{
    protected $table = 'covid19';
    protected $fillable = [
        'warga_id',
        'domisili',
        'rt_id',
        'rw_id',
        'konfirmasi',
        'status_pasien',
        'lokasi_pasien',
        'tanggal_status',
        'foto_status_pasien',
        'status_akhir',
        'tanggal_status_akhir',
        'no_hp',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
    public function rt()
    {
        return $this->belongsTo(RT::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
