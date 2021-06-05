<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipependidikan extends Model
{
    protected $table = 'tipependidikan';
    protected $fillable = ['kode', 'tipependidikan'];
    
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
}
