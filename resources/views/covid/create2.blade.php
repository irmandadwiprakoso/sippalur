@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/covid19" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="warga_id" class="form-label">NIK Warga</label>
            <select class="form-control @error('warga_id') is-invalid @enderror" id="warga_id" name="warga_id" value="{{ old('warga_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($warga as $penduduk)
                <option value="{{$penduduk->id}}" {{old('warga_id') == $penduduk->id ? 'selected' : null }}>{{$penduduk->NIK}}</option>
                @endforeach
            </select>
            @error ('warga_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="konfirmasi" class="form-label">Tanggal Konfirmasi</label>
            <input type="date" class="form-control @error('konfirmasi') is-invalid @enderror" id="konfirmasi" placeholder="Alamat Anda" name="konfirmasi" value="{{ old('konfirmasi') }}">
            @error ('konfirmasi') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_pasien" class="form-label">Status Pasien Saat Ini</label>
            <select class="form-control @error('status_pasien') is-invalid @enderror" id="status_pasien" name="status_pasien" value="{{ old('status_pasien') }}"> 
                <option selected disabled>- Pilih -</option>
                <option value="ISOMAN">ISOMAN</option>
                <option value="DIRAWAT">DIRAWAT</option>
            </select>
            @error ('status_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="lokasi_pasien" class="form-label">Lokasi Pasien Saat Ini</label>
            <input type="text" class="form-control @error('lokasi_pasien') is-invalid @enderror" id="lokasi_pasien" placeholder="Alamat Anda" name="lokasi_pasien" value="{{ old('lokasi_pasien') }}">
            @error ('lokasi_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_status" class="form-label">Tanggal Status Pasien Saat Ini</label>
            <input type="date" class="form-control @error('tanggal_status') is-invalid @enderror" id="tanggal_status" placeholder="Alamat Anda" name="tanggal_status" value="{{ old('tanggal_status') }}">
            @error ('tanggal_status') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
            <label for="foto_status_pasien" value="{{ old('foto_status_pasien') }}">Foto Status Pasien Saat Ini</label>
            <input type="file" class="form-control @error('foto_status_pasien') is-invalid @enderror" id="foto_status_pasien" name="foto_status_pasien">
            @error ('foto_status_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_akhir" class="form-label">Status Akhir Pasien Saat Ini</label>
            <select class="form-control @error('status_akhir') is-invalid @enderror" id="status_akhir" name="status_akhir" value="{{ old('status_akhir') }}"> 
                <option selected disabled>- Pilih -</option>
                <option value="Positif">POSITIF</option>
                <option value="Negatif">NEGATIF</option>
                <option value="Meniggal">MENINGGAL</option>
            </select>
            @error ('status_akhir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_status_akhir" class="form-label">Tanggal Status Akhir Pasien Saat Ini</label>
            <input type="date" class="form-control @error('tanggal_status_akhir') is-invalid @enderror" id="tanggal_status_akhir" placeholder="Alamat Anda" name="tanggal_status_akhir" value="{{ old('tanggal_status_akhir') }}">
            @error ('tanggal_status_akhir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP Pasien/Penanggung Jawab</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP Pasien" name="no_hp" value="{{ old('no_hp') }}">
            @error ('no_hp') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/covid19" role="button">Cancel</a>
        </div>
    </form>
        </div>
    </div>

@endsection