<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pns extends Model
{
    protected $table = 'pns';
    protected $fillable = [
    'id', 
    'NIK', 
    'nama', 
    'pangkat_id', 
    'golongan_id', 
    'jabatan_id' , 
    'tempat_lahir', 
    'tanggal_lahir', 
    'jeniskelamin_id', 
    'alamat', 
    'agama_id', 
    'pendidikanpeg_id',
    'statuskawin_id', 
    'SK_Jabatan', 
    'no_rek', 
    'npwp', 
    'email', 
    'no_HP', 
    'foto'
    ];  

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
    public function jeniskelamin()
    {
        return $this->belongsTo(Jeniskelamin::class);
    }
    public function pendidikanpeg()
    {
        return $this->belongsTo(Pendidikanpeg::class);
    }
    public function statuskawin()
    {
        return $this->belongsTo(Statuskawin::class);
    }
}
