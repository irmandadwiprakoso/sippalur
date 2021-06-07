@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Data Detail Covid-19</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $covid19->warga->nama}}</h3>
              <p class="text-muted text-center">{{ $covid19->warga->tempat_lahir}} - {{ $covid19->warga->tanggal_lahir}}</p>
              
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ $covid19->warga->NIK}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ $covid19->warga->alamat_domisili}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <a class="pull-right">{{ $covid19->warga->rt_id}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <a class="pull-right">{{ $covid19->warga->rw_id}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Konfirmasi</b> <a class="pull-right">{{ $covid19->konfirmasi}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Pasien</b> <a class="pull-right">{{ $covid19->status_pasien}}</a>
                </li>
                <li class="list-group-item">
                  <b>Lokasi Pasien</b> <a class="pull-right">{{ $covid19->lokasi_pasien}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Status</b> <a class="pull-right">{{ $covid19->tanggal_status}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Akhir</b> <a class="pull-right">{{ $covid19->status_akhir}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Status Akhir</b> <a class="pull-right">{{ $covid19->tanggal_status_akhir}}</a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <a class="pull-right">{{ $covid19->no_hp}}</a>
                </li>
                <li class="list-group-item">
                  <b>Foto Status Pasien</b>
                  <a href="{{asset('images/'. $covid19->foto_status_pasien)}}" target="_blank" class="pull-right">Lihat Foto</a>
                </li>
              </ul>
              
                  <a href="/covid19/" class="btn btn-default">Close</a>
             
            </div>
      </div>
</section>
@endsection