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
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nama</b> <br> <a class="">{{ $fasosfasum->nama}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <br> <a class="">{{ $fasosfasum->alamat}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <br> <a class="">{{ $fasosfasum->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <br> <a class="">{{ $fasosfasum->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>Koordinat Lokasi</b> <br> <a class="">{{ $fasosfasum->koordinat}}</a>
                </li>
                <li class="list-group-item">
                  <b>Luas Lokasi</b> <br> <a class="">{{ $fasosfasum->luas}}</a>
                </li>
                <li class="list-group-item">
                  <b>Pemanfaatan Lahan</b> <br> <a class="">{{ $fasosfasum->pemanfaatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Nama Pengembang</b> <br> <a class="">{{ $fasosfasum->nama_pengembang}}</a>
                </li>
                <li class="list-group-item">
                  <b>Nama Perumahan</b> <br> <a class="">{{ $fasosfasum->nama_perumahan}}</a>
                </li>
                <li class="list-group-item">
                  <b>Foto Lokasi</b>
                  <a href="{{asset('images/FasosFasum/'. $fasosfasum->foto)}}" target="_blank" class=""><br>
                  <img src="{{asset('images/FasosFasum/'. $fasosfasum->foto)}}" height="50%" width="50%"></img></a>
                </li>
                </ul>
              
                  <a href="/fasosfasum/" class="btn btn-default">Close</a>
             
            </div>
      </div>
</section>
@endsection