@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Warga <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Detail Data Warga</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $ktp-> nama}}</h3>
              <p class="text-muted text-center">{{ $ktp-> tempat_lahir}} - {{ $ktp-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item text-center">
                  <b>id</b> <br> <a class="">{{ $ktp-> id}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>KK</b> <br> <a class="">{{ $ktp-> KK}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Alamat KTP</b> <br> <a class="">{{ $ktp-> alamat_KTP}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>RT</b> <br> <a class="">{{ $ktp->rt->rt}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>RW</b> <br> <a class="">{{ $ktp->rw->rw}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Kelurahan</b> <br> <a class="">{{ $ktp-> kelurahan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Kecamatan</b> <br> <a class="">{{ $ktp-> kecamatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Kota / Kabupaten</b> <br> <a class="">{{ $ktp-> kota_kab}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Propinsi</b> <br> <a class="">{{ $ktp-> propinsi}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Agama</b> <br> <a class="">{{ $ktp->Agama->agama}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Status Perkawinan</b> <br> <a class="">{{ $ktp->Statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jenis Kelamin</b> <br> <a class="">{{ $ktp->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Pekerjaan</b> <br> <a class="">{{ $ktp-> pekerjaan}}</a>
                </li>
              </ul>
                  <a href="/ktp" class="btn btn-default">Close</a>
            </div>
      </div>
</section>
@endsection