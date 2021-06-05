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
}
