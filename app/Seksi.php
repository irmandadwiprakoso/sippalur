<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = 'seksi';
    protected $fillable = ['kode', 'seksi'];

    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
}
