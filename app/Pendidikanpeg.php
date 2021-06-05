<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikanpeg extends Model
{
    protected $table = 'pendidikanpeg';
    protected $fillable = ['kode', 'pendidikanpeg'];
    
    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
    public function asn()
    {
        return $this->hasMany(Asn::class);
    }
}
