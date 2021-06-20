@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data User <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">User Profile</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" 
              src="{{asset('images/TKK/'.auth()->user()->tkk->foto)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ auth()->user()->tkk-> nama}}</h3>
              <p class="text-muted text-center">{{ auth()->user()->tkk-> tempat_lahir}} - {{ auth()->user()->tkk-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ auth()->user()->tkk-> NIK}}</a>
                </li>
                <li class="list-group-item">
                  <b>KK</b> <a class="pull-right">{{ auth()->user()->tkk-> KK}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{ auth()->user()->tkk->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right">{{ auth()->user()->tkk->Agama->agama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ auth()->user()->tkk-> alamat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pendidikan</b> <a class="pull-right">{{ auth()->user()->tkk->pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Perkawinan</b> <a class="pull-right">{{ auth()->user()->tkk-> statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Seksi</b> <a class="pull-right">{{ auth()->user()->tkk-> seksi->seksi}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right">{{ auth()->user()->tkk-> jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>SK TKK</b> <a class="pull-right">{{ auth()->user()->tkk-> SK_Tkk}}</a>
                </li>
                <li class="list-group-item">
                  <b>Rekening BJB</b> <a class="pull-right">{{ auth()->user()->tkk-> no_rek}}</a>
                </li>
                <li class="list-group-item">
                  <b>NPWP</b> <a class="pull-right">{{ auth()->user()->tkk-> npwp}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ auth()->user()->tkk-> email}}</a>
                </li>
                <li class="list-group-item">
                  <b>No Handphone</b> <a class="pull-right">{{ auth()->user()->tkk-> no_HP}}</a>
                </li>
              </ul>
              <div class="box-footer">
                  <a href="/password/reset" class="btn btn-primary">Reset Password</a>
                  <a href="/dashboard" class="btn btn-default">Close</a>
                  </div>
             </div>
            </div>
      </div>
</section>
@endsection