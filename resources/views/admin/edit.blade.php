@extends('layout.master')

@section('title')

<section class="content">	
    <div class="box box-primary">
    <div class="register-box">
  <div class="register-logo">
    <a href=""><b>SIP </b>- PALUR</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Reset RW User by Superadmin</p>

    <form action="/user/{{$user->id}}/updateuser" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 

      <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $user->rw_id }}"> 
                <option selected value="{{ $user->rw_id }}">{{ $user->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

      <!-- <div class="row">
        <div class="col-xs-12"> -->
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
          <a class="btn btn-default btn-block btn-flat" href="/user" role="button"><b>Cancel</b></a>
        <!-- </div> -->
        <!-- /.col -->
      <!-- </div> -->
    </form>
    </div>
    </div>
    </div>
@endsection