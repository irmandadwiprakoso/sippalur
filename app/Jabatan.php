<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = ['kode', 'jabatan'];

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
}
