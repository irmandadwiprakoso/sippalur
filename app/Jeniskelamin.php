<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeniskelamin extends Model
{
    protected $table = 'jeniskelamin';
    protected $fillable = ['kode', 'jeniskelamin'];

    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
    public function asn()
    {
        return $this->hasMany(Asn::class);
    }
    public function pns()
    {
        return $this->hasMany(Pns::class);
    }
    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
    public function ktp()
    {
        return $this->hasMany(Ktp::class);
        // return $this->hasMany('App\Ktp','NIK');
    }
}
