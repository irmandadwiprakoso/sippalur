<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuskawin extends Model
{
    protected $table = 'statuskawin';
    protected $fillable = ['kode', 'statuskawin'];

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
        return $this->hasMany(Warga::class);
        // return $this->hasMany('App\Ktp','NIK');
    }
}
