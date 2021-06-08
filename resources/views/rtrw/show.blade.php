@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data RT RW <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">Data Detail RT RW</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $rtrw->warga->nama}}</h3>
              <p class="text-muted text-center">{{ $rtrw->warga->tempat_lahir}} - {{ $rtrw->warga->tanggal_lahir}}</p>
              
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ $rtrw->warga->NIK}}</a>
                </li>
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ $rtrw->warga->alamat_KTP}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <a class="pull-right">{{ $rtrw->warga->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <a class="pull-right">{{ $rtrw->warga->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>Jabatan</b> <a class="pull-right">{{ $rtrw->jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <a class="pull-right">{{ $rtrw->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <a class="pull-right">{{ $rtrw->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>NO SK</b> <a class="pull-right">{{ $rtrw->no_sk}}</a>
                </li>
                <li class="list-group-item">
                  <b>TMT</b> <a class="pull-right">{{ $rtrw->tmt}}</a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <a class="pull-right">{{ $rtrw->no_hp}}</a>
                </li>
                <li class="list-group-item">
                  <b>No Rekening BJB</b> <a class="pull-right">{{ $rtrw->no_rek}}</a>
                </li>
                <li class="list-group-item">
                  <b>NPWP</b> <a class="pull-right">{{ $rtrw->npwp}}</a>
                </li>
            </ul>
                <a href="/rtrw/" class="btn btn-default">Close</a>
             
            </div>
      </div>
</section>
@endsection