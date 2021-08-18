<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'username', 'rw_id',
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tkk(){
        return $this->hasOne(Tkk::class);
    }
    public function ibadah(){
        return $this->belongsTo(Ibadah::class);
    }
    public function kesehatan(){
        return $this->belongsTo(Kesehatan::class);
    }
    public function pendidikan(){
        return $this->belongsTo(Pendidikan::class);
    }
    public function kependudukan(){
        return $this->belongsTo(Kependudukan::class);
    }
    public function fasosfasum(){
        return $this->belongsTo(Fasosfasum::class);
    }
    public function rw(){
        return $this->belongsTo(Rw::class);
    }
    // public function pamor(){
    //     return $this->hasOne(Pamor::class);
    // }
}
