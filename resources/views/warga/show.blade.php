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
              <h3 class="profile-username text-center">{{ $warga-> nama}}</h3>
              <p class="text-muted text-center">{{ $warga-> tempat_lahir}} - {{ $warga-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ $warga-> NIK}}</a>
                </li>
                <li class="list-group-item">
                  <b>KK</b> <a class="pull-right">{{ $warga-> KK}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat KTP</b> <a class="pull-right">{{ $warga-> alamat_KTP}}</a>
                </li>

                <li class="list-group-item">
                  <b>RT</b> <a class="pull-right">{{ $warga->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <a class="pull-right">{{ $warga->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kelurahan</b> <a class="pull-right">{{ $warga-> kelurahan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kecamatan</b> <a class="pull-right">{{ $warga-> kecamatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kota / Kabupaten</b> <a class="pull-right">{{ $warga-> kota_kab}}</a>
                </li>
                <li class="list-group-item">
                  <b>Propinsi</b> <a class="pull-right">{{ $warga-> propinsi}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right">{{ $warga->Agama->agama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Status Perkawinan</b> <a class="pull-right">{{ $warga->Statuskawin->statuskawin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{ $warga->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pekerjaan</b> <a class="pull-right">{{ $warga-> pekerjaan}}</a>
                </li>
              </ul>
              
                  <a href="/warga" class="btn btn-default">Close</a>
            </div>
      </div>
</section>
@endsection