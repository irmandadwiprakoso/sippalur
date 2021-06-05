<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    protected $fillable = ['kode', 'golongan'];
    
    public function asn()
    {
        return $this->hasMany(Asn::class);
    }
}
