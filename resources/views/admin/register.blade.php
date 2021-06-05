@extends('layout.master')

@section('title')



<section class="content">	
    <div class="box box-primary">


    <div class="register-box">
  <div class="register-logo">
    <a href=""><b>SIP </b>- PALUR</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="/saveregister" method="post" enctype="multipart/form-data">
    @csrf 
      <div class="form-group has-feedback">
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full name" name="name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name') <div class="invalid-feedback">{{ $message }} </div>@enderror   
      </div>

      <div class="form-group has-feedback">
        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('username') <div class="invalid-feedback">{{ $message }} </div>@enderror   
      </div>

      <div class="form-group has-feedback">
            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role"> 
                <option selected disabled>- Role -</option>
                <option value="admin">Admin</option>
                <option value="kessos">Admin_Kessos</option>
                <option value="permasbang">Admin_Permasbang</option>
                <option value="pemtibum">Admin_Pemtibum</option>
                <option value="sekret">Admin_Sekret</option>
            </select>
            @error('role') <div class="invalid-feedback">{{ $message }} </div>@enderror   
        </div>


      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email') <div class="invalid-feedback">{{ $message }} </div>@enderror   
      </div>
<!-- 
      <div class="form-group has-feedback">
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password') <div class="invalid-feedback">{{ $message }} </div>@enderror   
      </div> -->

      <div class="row">
    
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    </div>
    </div>
    </div>
@endsection