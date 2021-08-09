@extends('layout.master')

@section('title')


<section class="content-header">
      <h1>Data Pegawai PNS <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Data Detail Pegawai PNS</div>
        <div class="panel-body">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('images/ASN/'.$pns->foto)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $pns-> nama}}</h3>
              <p class="text-muted text-center">{{ $pns-> tempat_lahir}} - {{ $pns-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item text-center">
                  <b>NIK</b> <br> <a class="">{{ $pns-> NIK}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Pangkat</b> <br> <a class="">{{ $pns->pangkat->pangkat}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Golongan</b> <br> <a class="">{{ $pns->golongan->golongan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jabatan</b> <br> <a class="">{{ $pns->jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jenis Kelamin</b> <br> <a class="">{{ $pns->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Alamat</b> <br> <a class="">{{ $pns-> alamat}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Agama</b> <br> <a class="">{{ $pns->agama->agama}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Pendidikan</b> <br> <a class="">{{ $pns->pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Status Perkawinan</b> <br> <a class="">{{ $pns->statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>SK Jabatan</b> <br> <a class="">{{ $pns->SK_Jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No Rek BJB</b> <br> <a class="">{{ $pns-> no_rek}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>NPWP</b> <br> <a class="">{{ $pns-> npwp}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Email</b> <br> <a class="">{{ $pns-> email}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No HP</b> <br> <a class="">{{ $pns-> no_HP}}</a>
                </li>
              </ul>

                  <a href="/pns/" class="btn btn-default">Close</a>
						      <!-- <a href="/pns/{{$pns->id}}/edit" class="btn btn-warning">Edit</a> -->

            </div>
        </div>
     </section>
@endsection