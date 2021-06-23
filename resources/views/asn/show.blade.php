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
              <img class="profile-user-img img-responsive img-circle" src="{{asset('images/ASN/'.$asn->foto)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ $asn-> nama}}</h3>
              <p class="text-muted text-center">{{ $asn-> tempat_lahir}} - {{ $asn-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ $asn-> NIK}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pangkat</b> <a class="pull-right">{{ $asn->pangkat->pangkat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Golongan</b> <a class="pull-right">{{ $asn->golongan->golongan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right">{{ $asn->jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{ $asn->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ $asn-> alamat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right">{{ $asn->agama->agama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pendidikan</b> <a class="pull-right">{{ $asn->pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Perkawinan</b> <a class="pull-right">{{ $asn->statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item">
                  <b>SK Jabatan</b> <a class="pull-right">{{ $asn->SK_Jabatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>No Rek BJB</b> <a class="pull-right">{{ $asn-> no_rek}}</a>
                </li>
                <li class="list-group-item">
                  <b>NPWP</b> <a class="pull-right">{{ $asn-> npwp}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right">{{ $asn-> email}}</a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <a class="pull-right">{{ $asn-> no_HP}}</a>
                </li>
              </ul>

                  <a href="/asn/" class="btn btn-default">Close</a>
						      <!-- <a href="/asn/{{$asn->id}}/edit" class="btn btn-warning">Edit</a> -->

            </div>
        </div>
     </section>
@endsection