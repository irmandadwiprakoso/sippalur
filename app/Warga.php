<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $fillable = [
        'NIK',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_KTP',
        'alamat_domisili',
        'rt_id',
        'rw_id',
        'agama_id',
        'statuskawin_id',
        'jeniskelamin_id',
        'pekerjaan',
    ];

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jeniskelamin()
    {
        return $this->belongsTo(Jeniskelamin::class);
    }
    public function statuskawin()
    {
        return $this->belongsTo(Statuskawin::class);
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function covid19()
    {
        return $this->hasMany(Covid19::class);
    }
    public function rtrw()
    {
        return $this->hasMany(Rtrw::class);
    }

}