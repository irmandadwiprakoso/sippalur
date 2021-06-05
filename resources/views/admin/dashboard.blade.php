@extends('layout.master')

@section('title')

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
        <div class="main-container">

<!-- Row start -->
<div class="row gutte">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="table-container ">
      <div class="content">
          <div class="title m-b-md">
              <center>
              <img src="/images/LogoKotaBekasi.png"  height="80px">
              <h2>Selamat Datang {{auth()->user()->name}} 
              <br>di Website Sistem Informasi Pelaporan Pamor Kelurahan
              <br>(SIP-PALUR)</h2>
              </center>
          </div>
      </div>
<br>
<br>
    </div>
  </div>
</div>
</div>
      </div>
    </section>
@endsection
