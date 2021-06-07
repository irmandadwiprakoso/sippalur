<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtrw extends Model
{
    protected $table = 'rtrw';
    protected $fillable = [
        'warga_id',
        'jabatan_id',
        'rt_id',
        'rw_id',
        'no_sk',
        'tmt',
        'no_hp',
        'no_rek',
        'npwp',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
