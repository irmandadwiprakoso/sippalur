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
              <h3 class="profile-username text-center">{{ $rtrw->ktp->nama}}</h3>
              <p class="text-muted text-center">{{ $rtrw->ktp->tempat_lahir}} - {{ $rtrw->ktp->tanggal_lahir}}</p>            
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item text-center">
                  <b>NIK</b> <br> <a class="">{{ $rtrw->ktp->id}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Alamat</b> <br> <a class="">{{ $rtrw->ktp->alamat_KTP}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>RT</b> <br> <a class="">{{ $rtrw->ktp->rt->rt}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>RW</b> <br> <a class="">{{ $rtrw->ktp->rw->rw}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>Jabatan</b> <br> <a class="">{{ $rtrw->jabatan->jabatan}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>RT</b> <br> <a class="">{{ $rtrw->rt->rt}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>RW</b> <br> <a class="">{{ $rtrw->rw->rw}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>NO SK</b> <br> <a class="">{{ $rtrw->no_sk}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>TMT</b> <br> <a class="">{{ $rtrw->tmt}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No HP</b> <br> <a class="">{{ $rtrw->no_hp}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>No Rekening BJB</b> <br> <a class="">{{ $rtrw->no_rek}}</a>
                </li>
                <li class="list-group-item text-center">
                  <b>NPWP</b> <br> <a class="">{{ $rtrw->npwp}}</a>
                </li>
            </ul>
                <a href="/rtrw/" class="btn btn-default">Close</a>
             
            </div>
      </div>
</section>
@endsection