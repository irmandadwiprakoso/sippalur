<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $table = 'rw';
    protected $fillable = ['kode', 'rw'];

    public function ibadah()
    {
        return $this->hasMany(Ibadah::class);
    }
    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class);
    }
    public function kesehatan()
    {
        return $this->hasMany(Kesehatan::class);
    }
    public function roleuser()
    {
        return $this->hasMany(RoleUser::class);
    }
    public function tkk()
    {
        return $this->hasMany(Tkk::class);
    }
}
