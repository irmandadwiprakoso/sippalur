<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rt extends Model
{
    protected $table = 'rt';
    protected $fillable = ['kode', 'rt'];
    

    public function ibadah()
    {
        return $this->hasMany(Ibadah::class);
    }
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function kesehatan()
    {
        return $this->hasMany(Kesehatan::class);
    }
    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
    public function ktp()
    {
        // return $this->hasMany(Ktp::class);
        return $this->hasMany('App\Ktp','NIK');
    }
    public function kependudukan()
    {
        return $this->hasMany(Kependudukan::class);
    }
    public function rtrw()
    {
        return $this->hasMany(Rtrw::class);
    }
    public function ksbrt()
    {
        return $this->hasMany(Ksbrt::class);
    }
    public function ksbrw()
    {
        return $this->hasMany(Ksbrw::class);
    }
    public function fasosfasum()
    {
        return $this->hasMany(Fasosfasum::class);
    }
    public function covid19()
    {
        return $this->hasMany(Covid19::class);
    }
    public function pamor()
    {
        return $this->hasMany(Pamor::class);
    }
}
