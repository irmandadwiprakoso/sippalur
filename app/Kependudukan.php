<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    protected $table = 'kependudukan';
    protected $fillable = [
        'rt_id',
        'rw_id',
        'KK',
        'Laki_laki',
        'Perempuan',
    ];
    
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

}
