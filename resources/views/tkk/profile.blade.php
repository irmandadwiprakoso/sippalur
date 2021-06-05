@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data User <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">User Profile</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" 
              src="{{asset('images/'.auth()->user()->tkk->foto)}}" alt="User profile picture">
              <h3 class="profile-username text-center">{{ auth()->user()->tkk-> nama}}</h3>
              <p class="text-muted text-center">{{ auth()->user()->tkk-> tempat_lahir}} - {{ auth()->user()->tkk-> tanggal_lahir}}</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ auth()->user()->tkk-> NIK}}</a>
                </li>
                
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{ auth()->user()->tkk->Jeniskelamin->jeniskelamin}}</a>
                </li>
                <li class="list-group-item">
                  <b>Agama</b> <a class="pull-right">{{ auth()->user()->tkk->Agama->agama}}</a>
                </li>
                
                <li class="list-group-item">
                  <b>Alamat</b> <a class="pull-right">{{ auth()->user()->tkk-> alamat}}</a>
                </li>
              </ul>
              <div class="box-footer">
                  <a href="/dashboard" class="btn btn-default">Close</a>
                  <a href="/reset"  class="btn btn-default">Reset Password</a>
                  </div>
             </div>
            </div>
      </div>
</section>
@endsection