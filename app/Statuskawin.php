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
}
