@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Pegawai TKK <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Data Detail Pegawai TKK</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('images/'.$tkk->foto)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $tkk-> nama}}</h3>
              <p class="text-muted text-center">{{ $tkk-> tempat_lahir}} - {{ $tkk-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ $tkk-> NIK}}</a>
                </li>
                <li class="list-group-item">
                  <b>KK</b> <a class="pull-right">{{ $tkk-> KK}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{ $tkk->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right">{{ $tkk->Agama->agama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pendidikan</b> <a class="pull-right">{{ $tkk->Pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ $tkk-> alamat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Perkawinan</b> <a class="pull-right">{{ $tkk->Statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Seksi</b> <a class="pull-right">{{ $tkk->Seksi->seksi}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right">{{ $tkk->Jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>SK TKK</b> <a class="pull-right">{{ $tkk-> SK_Tkk}}</a>
                </li>
                <li class="list-group-item">
                  <b>No Rek BJB</b> <a class="pull-right">{{ $tkk-> no_rek}}</a>
                </li>
                <li class="list-group-item">
                  <b>NPWP</b> <a class="pull-right">{{ $tkk-> npwp}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $tkk-> email}}</a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <a class="pull-right">{{ $tkk-> no_HP}}</a>
                </li>
              </ul>
              <div class="box-footer">
                  <a href="/tkk/" class="btn btn-default">Close</a>
             </div>
            </div>
      </div>
</section>
@endsection