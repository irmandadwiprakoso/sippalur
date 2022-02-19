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
            <a href="{{asset('images/ASN/'. $asn->foto)}}" target="_blank" class="">
            <img class="profile-user-img img-responsive img-circle" src="{{asset('images/ASN/'.$asn->foto)}}" alt="User profile picture">
            </a>  

              <h1 class="profile-username text-center">{{ $asn-> nama}}</h1>
              <h2 class="profile-username text-center">{{ $asn-> id}}</h2>
              <p class="text-muted text-center">{{ $asn-> tempat_lahir}} - {{ $asn-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">

                <li class="list-group-item text-center">
                  <b>NIK</b> <br> <a class="">{{ $asn-> NIK}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Pangkat</b> <br> <a class="">{{ $asn->pangkat->pangkat}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Golongan</b> <br> <a class="">{{ $asn->golongan->golongan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jabatan</b> <br> <a class="">{{ $asn->jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jenis Kelamin</b> <br> <a class="">{{ $asn->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Alamat</b> <br> <a class="">{{ $asn-> alamat}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Agama</b> <br> <a class="">{{ $asn->agama->agama}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Pendidikan</b> <br> <a class="">{{ $asn->pendidikanpeg->pendidikanpeg}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Status Perkawinan</b> <br> <a class="">{{ $asn->statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>SK Jabatan</b> <br> <a class="">{{ $asn->SK_Jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No Rek BJB</b> <br> <a class="">{{ $asn-> no_rek}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>NPWP</b> <br> <a class="">{{ $asn-> npwp}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Email</b> <br> <a class="">{{ $asn-> email}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No HP</b> <br> <a class="">{{ $asn-> no_HP}}</a>
                </li>
              </ul>
                  <a href="/asn/" class="btn btn-default">Close</a>
						      <a href="/asn/{{$asn->id}}/edit" class="btn btn-warning">Edit</a>
            </div>
        </div>
     </section>
@endsection