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
              <img class="profile-user-img img-responsive img-circle" src="{{asset('images/TKK/'.$tkk->foto)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $tkk-> nama}}</h3>
              <p class="text-muted text-center">{{ $tkk-> tempat_lahir}} - {{ $tkk-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item text-center">
                  <b>NIK</b> <br><a class="">{{ $tkk-> NIK}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>KK</b> <br><a class="">{{ $tkk-> KK}}</a>
                </li>

                <li class="list-group-item text-center text-center">
                <b>Jenis Kelamin</b> <br> <a class="r">{{ $tkk->Jeniskelamin->jeniskelamin}}</a>
                </li> 
              
                <li class="list-group-item text-center text-center">
                  <b>Agama</b> <br> <a class="">{{ $tkk->Agama->agama}}</a>
                </li>
                <li class="list-group-item text-center text-center">
                  <b>Pendidikan</b> <br> <a class="">{{ $tkk->Pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Alamat</b><br> <a class="">{{ $tkk-> alamat}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Status Perkawinan</b><br> <a class="">{{ $tkk->Statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Seksi</b> <br><a class="">{{ $tkk->Seksi->seksi}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jabatan</b><br> <a class="">{{ $tkk->Jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>SK TKK</b><br> <a class="">{{ $tkk-> SK_Tkk}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No Rek BJB</b><br> <a class="">{{ $tkk-> no_rek}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>NPWP</b> <br><a class="">{{ $tkk-> npwp}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Email</b> <br><br><a class="">{{ $tkk-> email}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No HP</b> <br><a class="">{{ $tkk-> no_HP}}</a>
                </li>
              </ul>
            
                  <a href="/tkk/" class="btn btn-default">Close</a>
             
            </div>
      </div>
</section>
@endsection