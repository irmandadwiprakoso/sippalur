<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasosfasum extends Model
{
    protected $table = 'fasosfasum';
    protected $fillable = [
        'nama',
        'alamat',
        'rt_id',
        'rw_id',
        'koordinat',
        'luas',
        'pemanfaatan',
        'nama_pengembang',
        'nama_perumahan',
        'foto',
        'user_id',
    ];
    
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
