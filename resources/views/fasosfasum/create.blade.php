@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data Fasos Fasum <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/fasosfasum" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama FASOS/FASUM" name="nama" value="{{ old('nama') }}">
            @error ('nama') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat FASOS/FASUM" name="alamat" value="{{ old('alamat') }}">
            @error ('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ old('rt_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ old('rw_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="koordinat" class="form-label">Koordinat Lokasi</label>
            <input type="text" class="form-control @error('koordinat') is-invalid @enderror" id="koordinat" placeholder="Koordinat Lokasi" name="koordinat" value="{{ old('koordinat') }}">
            @error ('koordinat') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="luas" class="form-label">Luas Lokasi</label>
            <input type="number" class="form-control @error('luas') is-invalid @enderror" id="luas" placeholder="Luas Lokasi" name="luas" value="{{ old('luas') }}">
            @error ('luas') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pemanfaatan" class="form-label">Pemanfaatan Lokasi</label>
            <input type="text" class="form-control @error('pemanfaatan') is-invalid @enderror" id="pemanfaatan" placeholder="Pemanfaatan Lokasi" name="pemanfaatan" value="{{ old('pemanfaatan') }}">
            @error ('pemanfaatan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="nama_pengembang" class="form-label">Nama Pengembang</label>
            <input type="text" class="form-control @error('nama_pengembang') is-invalid @enderror" id="nama_pengembang" placeholder="Nama Pengembang" name="nama_pengembang" value="{{ old('nama_pengembang') }}">
            @error ('nama_pengembang') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="nama_perumahan" class="form-label">Nama Perumahan</label>
            <input type="text" class="form-control @error('nama_perumahan') is-invalid @enderror" id="nama_perumahan" placeholder="Nama Perumahan" name="nama_perumahan" value="{{ old('nama_perumahan') }}">
            @error ('nama_perumahan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="input-group mb-3">
            <label for="foto" value="{{ old('foto') }}">Foto Objek</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error ('foto') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/fasosfasum" role="button">Cancel</a>
        </div>
    </form>
        </div>
    </div>

@endsection