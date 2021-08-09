<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'sarana_pendidikan';
    protected $fillable = ['nama_sarana_pendidikan', 'tipependidikan_id', 'alamat', 'rt_id', 'rw_id', 'nama_pimpinan','status_lahan'];

    public function tipependidikan()
    {
        return $this->belongsTo(Tipependidikan::class);
    }

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
