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
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $pamor->user['name']}}</h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item ">
                  <b>Tanggal</b> <br> <a class="">{{ $pamor->tanggal}}</a>
                </li>
                <li class="list-group-item">
                  <b>Kegiatan</b> <br> <a class="">{{ $pamor->kegiatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jumlah</b> <br> <a class="">{{ $pamor->jumlah}}</a>
                </li>
                <li class="list-group-item">
                  <b>Bidang</b> <br> <a class="">{{ $pamor->bidang}}</a>
                </li>
                <li class="list-group-item">
                  <b>Keterangan</b> <br> <a class="">{{ $pamor->keterangan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Tindak Lanjut</b> <br> <a class="">{{ $pamor->tinjut}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <br> <a class="">{{ $pamor->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <br> <a class="">{{ $pamor->rw->rw}}</a>
                </li>

                <li class="list-group-item">
                  <b>Foto Kegiatan</b>
                  <a href="{{asset('images/LaporanHarian/'. $pamor->foto)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/LaporanHarian/'. $pamor->foto)}}" height="50%" width="50%"></img></a>
                </li>
              </ul>


                  <a href="/pamor/" class="btn btn-default">Close</a>
            </div>
      </div>
</section>
@endsection