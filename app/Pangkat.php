<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    protected $table = 'pangkat';
    protected $fillable = ['kode', 'pangkat'];
    
    public function asn()
    {
        return $this->hasMany(Asn::class);
    }
    public function pns()
    {
        return $this->hasMany(Pns::class);
    }
}
