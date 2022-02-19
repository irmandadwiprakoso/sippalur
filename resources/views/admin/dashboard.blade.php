@extends('layout.master')

@section('title')

<section class="content">	
  <div class="box box-primary">
    <div class="row gutte">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="table-container ">
          <div class="content">
          <div class="title m-b-md"> 
              <center>
              <img src="/images/iconsippalur.png" height="100px">
              <h2>Selamat Datang 
              <br>{{auth()->user()->name}} 
              <br>di Website Sistem Informasi Pelaporan Pamor Kelurahan
              <br>(SIP-PALUR)
              </h2>
              </center>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div> 
</section>

@endsection
