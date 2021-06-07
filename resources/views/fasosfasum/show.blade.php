@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Fasos Fasum <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Data Detail Fasos Fasum</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $fasosfasum->nama}}</h3>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ $fasosfasum->alamat}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <a class="pull-right">{{ $fasosfasum->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <a class="pull-right">{{ $fasosfasum->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>Koordinat Lokasi</b> <a class="pull-right">{{ $fasosfasum->koordinat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Luas Lokasi</b> <a class="pull-right">{{ $fasosfasum->luas}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pemanfaatan Lahan</b> <a class="pull-right">{{ $fasosfasum->pemanfaatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Nama Pengembang</b> <a class="pull-right">{{ $fasosfasum->nama_pengembang}}</a>
                </li>
                <li class="list-group-item">
                  <b>Nama Perumahan</b> <a class="pull-right">{{ $fasosfasum->nama_perumahan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Foto</b>
                  <a href="{{asset('images/'. $fasosfasum->foto)}}" target="_blank" class="pull-right">Lihat Foto</a>
                </li>
              </ul>
              
                  <a href="/fasosfasum/" class="btn btn-default">Close</a>
             
            </div>
      </div>
</section>
@endsection