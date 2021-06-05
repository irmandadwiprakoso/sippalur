<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipeibadah extends Model
{
    protected $table = 'tipeibadah';
    protected $fillable = ['kode', 'tipeibadah'];
    
    public function ibadah()
    {
        return $this->hasMany(Ibadah::class);
    }
}
