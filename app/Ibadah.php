<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
    protected $table = 'sarana_ibadah';
    protected $fillable = ['nama_sarana_ibadah', 'tipeibadah_id', 'alamat', 'rt_id', 'rw_id', 'nama_pimpinan','status_lahan', 'user_id'];

    public function tipeibadah()
    {
        return $this->belongsTo(Tipeibadah::class);
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
