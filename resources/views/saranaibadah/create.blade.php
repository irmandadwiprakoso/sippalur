@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data Sarana Ibadah <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/ibadah" method="post">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama_sarana_ibadah" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_sarana_ibadah') is-invalid @enderror" id="nama_sarana_ibadah" placeholder="Nama Sarana Ibadah" name="nama_sarana_ibadah" value="{{ old('nama_sarana_ibadah') }}">
            @error('nama_sarana_ibadah') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tipeibadah_id" class="form-label">Tipe</label>
            <select class="form-control @error('tipeibadah_id') is-invalid @enderror" id="tipeibadah_id" name="tipeibadah_id" value="{{ old('tipeibadah_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($tipeibadah as $tipe)
                <option value="{{$tipe->id}}" {{old('tipeibadah_id') == $tipe->id ? 'selected' : null }}>{{$tipe->tipeibadah}}</option>
                @endforeach
            </select>
            @error ('tipeibadah_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}">
            @error('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror       
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
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan </label>
            <input type="text" class="form-control @error('nama_pimpinan') is-invalid @enderror" id="nama_pimpinan" placeholder="Nama Pimpinan Sarana Ibadah" name="nama_pimpinan" value="{{ old('nama_pimpinan') }}">
            @error ('nama_pimpinan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_lahan" class="form-label">Status Lahan</label>
            <select class="form-control @error('status_lahan') is-invalid @enderror" id="status_lahan" name="status_lahan" value="{{ old('status_lahan') }}"> 
                <option selected disabled>- Pilih -</option>
                <option value="SHM">SHM</option>
                <option value="FASOS/FASUM">FASOS/FASUM</option>
                <option value="WAKAF">WAKAF</option>
            </select>
            @error ('status_lahan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/ibadah" role="button">Close</a>
        </div>
</form>
        </div>
    </div>


@endsection