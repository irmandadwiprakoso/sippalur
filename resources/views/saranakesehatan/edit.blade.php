@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data Sarana Kesehatan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/kesehatan/{{ $kesehatan->id }}" method="post">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama_sarana_kesehatan" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_sarana_kesehatan') is-invalid @enderror" id="nama_sarana_kesehatan" placeholder="Nama Sarana Kesehatan" name="nama_sarana_kesehatan" value="{{ $kesehatan->nama_sarana_kesehatan }}">
            @error('nama_sarana_kesehatan') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tipekesehatan_id" class="form-label">Tipe</label>
            <select class="form-control @error('tipekesehatan_id') is-invalid @enderror"  id="tipekesehatan_id" name="tipekesehatan_id" value="{{ $kesehatan->tipekesehatan_id }}"> 
                <option selected value="{{ $kesehatan->tipekesehatan_id }}">{{ $kesehatan->tipekesehatan->tipekesehatan}}</option>
                @foreach ($tipekesehatan as $tipe)
                <option value="{{$tipe->id}}">{{$tipe->tipekesehatan}}</option>
                @endforeach
            </select>
            @error ('tipekesehatan_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ $kesehatan->alamat }}">
            @error('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ $kesehatan->rt_id }}"> 
                <option selected value="{{ $kesehatan->rt_id }}">{{ $kesehatan->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ $kesehatan->rw_id }}"> 
                <option selected value="{{ $kesehatan->rw_id }}">{{ $kesehatan->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan </label>
            <input type="text" class="form-control @error('nama_pimpinan') is-invalid @enderror" id="nama_pimpinan" placeholder="Nama Pimpinan Sarana Ibadah" name="nama_pimpinan" value="{{ $kesehatan->nama_pimpinan }}">
            @error ('nama_pimpinan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/kesehatan" role="button">Close</a>
        </div>

</form>
        </div>
    </div>


@endsection