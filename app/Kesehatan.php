<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    protected $table = 'sarana_kesehatan';
    protected $fillable = ['nama_sarana_kesehatan', 'tipekesehatan_id', 'alamat', 'rt_id', 'rw_id', 'nama_pimpinan','status_lahan'];

    public function tipekesehatan()
    {
        return $this->belongsTo(Tipekesehatan::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
