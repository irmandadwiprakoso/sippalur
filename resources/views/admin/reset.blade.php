@extends('layout.master')

@section('title')

<section class="content">	
    <div class="box box-primary">
    <div class="register-box">
  <div class="register-logo">
    <a href=""><b>SIP </b>- PALUR</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Reset Password</p>

    <form action="/password/update" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 

       <div class="form-group has-feedback">
       <label for="old_password">Old Password</label>
        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="old-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('old_password') <div class="invalid-feedback">{{ $message }} </div>@enderror  
      </div>
      

       <div class="form-group has-feedback">
       <label for="password">New Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password') <div class="invalid-feedback">{{ $message }} </div>@enderror  
      </div>

      <div class="form-group has-feedback">
      <label for="password_confirmation">Confirmed Password</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"name="password_confirmation" id="password-confirmation" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password_confirmation') <div class="invalid-feedback">{{ $message }} </div>@enderror  
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Change Password</button>
          <a class="btn btn-default btn-block btn-flat" href="/profile" role="button"><b>Cancel</b></a>
        </div>
      </div>
    </form>
    </div>
    </div>
    </div>
@endsection