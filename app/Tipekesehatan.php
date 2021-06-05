<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipekesehatan extends Model
{
    protected $table = 'tipekesehatan';
    protected $fillable = ['kode', 'tipekesehatan'];
    
    public function kesehatan()
    {
        return $this->hasMany(Kesehatan::class);
    }
}
