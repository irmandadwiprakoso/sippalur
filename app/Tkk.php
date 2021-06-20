<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tkk extends Model
{
    use SoftDeletes;
    protected $table = 'tkk';
    protected $fillable = ['NIK', 'nama', 'KK', 'tempat_lahir', 'tanggal_lahir', 'jeniskelamin_id', 'alamat', 'agama_id', 'pendidikanpeg_id', 'statuskawin_id', 'seksi_id', 'jabatan_id','SK_Tkk', 'no_rek', 'npwp', 'email', 'no_HP', 'foto', 'user_id', 'username', 'rw_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['foto' => 'default.jpg']);
    }

    public function getFoto()
    {
        if(!$this->foto){
            return asset('images/TKK/default.jpg');
        }
        return asset('images/TKK/'.$this->foto);
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
    public function seksi()
    {
        return $this->belongsTo(Seksi::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
