@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Data Detail Pasien Covid-19</div>
                    <div class="panel-body">

          <div class="box box-primary">
            <div class="box-body box-profile">
              <h1 class="profile-username text-center">{{ $covid19->ktp->nama}}</h3>
              <h3 class="profile-username text-center">{{ $covid19->ktp->id}}</h3>
              <h3 class="profile-username text-center">{{ $covid19->ktp->jeniskelamin->jeniskelamin}}</h3>
              <p class="text-muted text-center">{{ $covid19->ktp->tempat_lahir}} - {{ $covid19->ktp->tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Domisili Tempat Tinggal</b> <br> <a class="">{{ $covid19->domisili}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT Domisili Tempat Tinggal</b> <br> <a class="">{{ $covid19->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW Domisili Tempat Tinggal</b> <br> <a class="">{{ $covid19->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Konfirmasi</b> <br> <a class="">{{ $covid19->konfirmasi}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Pasien</b> <br> <a class="">{{ $covid19->status_pasien}}</a>
                </li>
                <li class="list-group-item">
                  <b>Lokasi Pasien</b> <br> <a class="">{{ $covid19->lokasi_pasien}}</a>
                </li>
                <li class="list-group-item">
                  <b>Hasil Test</b> <br> <a class="">{{ $covid19->hasil_test}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Monitoring 1</b> <br> <a class="">{{ $covid19->tglmonitoring1}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kegiatan Monitoring 1</b> <br> <a class="">{{ $covid19->monitoring1}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Monitoring 2</b> <br> <a class="">{{ $covid19->tglmonitoring2}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kegiatan Monitoring 2</b> <br> <a class="">{{ $covid19->monitoring2}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Monitoring 3</b> <br> <a class="">{{ $covid19->tglmonitoring3}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kegiatan Monitoring 3</b> <br> <a class="">{{ $covid19->monitoring3}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Akhir</b> <br> <a class="">{{ $covid19->status_akhir}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Status Akhir</b> <br> <a class="">{{ $covid19->tanggal_status_akhir}}</a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <br> <a class="">{{ $covid19->no_hp}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tindak Lanjut Kelurahan</b> <br> <a class="">{{ $covid19->tinjut}}</a>
                </li>
                <li class="list-group-item">
                  <b>Hasil Tindak Lanjut</b> <br> <a class="">{{ $covid19->keterangan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Sumber Pasien Terpapar Covid</b> <br> <a class="">{{ $covid19->sumbercovid}}</a>
                </li>
                <li class="list-group-item">
                  <b>Foto KTP Pasien</b>
                  <a href="{{asset('images/Covid19/KTP/'. $covid19->foto_KTP)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/KTP/'. $covid19->foto_KTP)}}" height="50%" width="50%"></img></a>
                </li>
                <li class="list-group-item">
                  <b>Foto KK Pasien</b>
                  <a href="{{asset('images/Covid19/KK/'. $covid19->foto_KK)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/KK/'. $covid19->foto_KK)}}" height="50%" width="50%"></img></a>
                </li>
                <li class="list-group-item">
                  <b>Foto Status Pasien</b>
                  <a href="{{asset('images/Covid19/StatusAwalPasien/'. $covid19->foto_status_pasien)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/StatusAwalPasien/'. $covid19->foto_status_pasien)}}" height="50%" width="50%"></img></a>
                </li>
                <li class="list-group-item">
                  <b>Foto Status Akhir Pasien</b>
                  <a href="{{asset('images/Covid19/StatusAkhirPasien/'. $covid19->foto_status_akhir)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/StatusAkhirPasien/'. $covid19->foto_status_akhir)}}" height="50%" width="50%"></img></a>
                </li>
                <li class="list-group-item">
                  <b>Foto Monitoring 1</b>
                  <a href="{{asset('images/Covid19/Monitoring1/'. $covid19->fotomonitoring1)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/Monitoring1/'. $covid19->fotomonitoring1)}}" height="50%" width="50%"></img></a>
                </li>
                <li class="list-group-item">
                  <b>Foto Monitoring 2</b>
                  <a href="{{asset('images/Covid19/Monitoring2/'. $covid19->fotomonitoring2)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/Monitoring2/'. $covid19->fotomonitoring2)}}" height="50%" width="50%"></img></a>
                </li>
                <li class="list-group-item">
                  <b>Foto Monitoring 3</b>
                  <a href="{{asset('images/Covid19/Monitoring3/'. $covid19->fotomonitoring3)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/Covid19/Monitoring3/'. $covid19->fotomonitoring3)}}" height="50%" width="50%"></img></a>
                </li>
              </ul>
                  <a href="/covid19" class="btn btn-default">Back</a>
            </div>
            </div>
            </div>
            </div>
      </div>
      </div>
      
</section>
@endsection