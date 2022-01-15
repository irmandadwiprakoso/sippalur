@extends('layout.master')

@section('title')

<section class="content">	
    <div class="box box-primary">
    <div class="register-box">
  <div class="register-logo">
    <a href=""><b>SIP </b>- PALUR</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Edit Username User by Superadmin</p>

    <form action="/user/{{$user->id}}/updateusername" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 

    <div class="form-group has-feedback">
       <label for="username">Old Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="old-username" value="{{ $user->username }}" disabled>
        @error('username') <div class="invalid-feedback">{{ $message }} </div>@enderror  
      </div>
      
       <div class="form-group has-feedback">
       <label for="username">New Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username">
        @error('username') <div class="invalid-feedback">{{ $message }} </div>@enderror  
      </div>

          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
          <a class="btn btn-default btn-block btn-flat" href="/user" role="button"><b>Cancel</b></a>

    </form>
    </div>
    </div>
    </div>
@endsection