<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covid19 extends Model
{
    protected $table = 'covid19';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ktp_id',
        'foto_KTP',
        'foto_KK',
        'domisili',
        'rt_id',
        'rw_id',
        'konfirmasi',
        'status_pasien',
        'lokasi_pasien',
        'foto_status_pasien',
        'hasil_test',
        'tglmonitoring1',
        'monitoring1',
        'fotomonitoring1',
        'tglmonitoring2',
        'monitoring2',
        'fotomonitoring2',
        'tglmonitoring3',
        'monitoring3',
        'fotomonitoring3',
        'status_akhir',
        'tanggal_status_akhir',
        'foto_status_akhir',
        'no_hp',
        'tinjut',
        'keterangan',
        'sumbercovid',
    ];

    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
        // return $this->belongsTo('App\Ktp','NIK');
    }
    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }
    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
