@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Laporan Kegiatan Harian Satgas Pamor<small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Laporan Kegiatan Harian Satgas Pamor</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <!-- <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $pamor->nama}}</h3> -->
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Tanggal</b> <a class="pull-right">{{ $pamor->tanggal}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kegiatan</b> <a class="pull-right">{{ $pamor->kegiatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jumlah</b> <a class="pull-right">{{ $pamor->jumlah}}</a>
                </li>
                <li class="list-group-item">
                  <b>Bidang</b> <a class="pull-right">{{ $pamor->bidang}}</a>
                </li>
                <li class="list-group-item">
                  <b>Keterangan</b> <a class="pull-right">{{ $pamor->keterangan}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <a class="pull-right">{{ $pamor->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <a class="pull-right">{{ $pamor->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>Foto</b>
                  <a href="{{asset('images/'. $pamor->foto)}}" target="_blank" class="pull-right">Lihat Foto</a>
                </li>
                </ul>
                  <a href="/pamor/" class="btn btn-default">Close</a>
            </div>
      </div>
</section>
@endsection