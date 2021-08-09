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
              <h3 class="profile-username text-center">{{ auth()->user()->tkk-> id}}</h3>
              <p class="text-muted text-center">{{ auth()->user()->tkk-> tempat_lahir}} - {{ auth()->user()->tkk-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">

                <li class="list-group-item text-center">
                  <b>KK</b> <br> <a class="">{{ auth()->user()->tkk-> KK}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jenis Kelamin</b> <br> <a class="">{{ auth()->user()->tkk->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Agama</b> <br> <a class="">{{ auth()->user()->tkk->Agama->agama}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Alamat</b> <br> <a class="">{{ auth()->user()->tkk-> alamat}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Pendidikan</b> <br> <a class="">{{ auth()->user()->tkk->pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Status Perkawinan</b> <br> <a class="">{{ auth()->user()->tkk-> statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Seksi</b> <br> <a class="">{{ auth()->user()->tkk-> seksi->seksi}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jabatan</b> <br> <a class="">{{ auth()->user()->tkk-> jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>SK TKK</b> <br> <a class="">{{ auth()->user()->tkk-> SK_Tkk}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Rekening BJB</b> <br> <a class="">{{ auth()->user()->tkk-> no_rek}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>NPWP</b> <br> <a class="">{{ auth()->user()->tkk-> npwp}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Email</b> <br> <a class="">{{ auth()->user()->tkk-> email}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No Handphone</b> <br> <a class="">{{ auth()->user()->tkk-> no_HP}}</a>
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