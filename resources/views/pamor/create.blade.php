@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Laporan Harian Kegiatan Satgas Pamor <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/pamor" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="tanggal" class="text-danger">Tanggal Kegiatan*</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"  name="tanggal" value="{{ old('tanggal') }}">
            @error ('tanggal') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kegiatan" class="text-danger">Kegiatan Pamor*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" placeholder="Uraian Kegiatan Kamu" name="kegiatan" value="{{ old('kegiatan') }}">
            @error ('kegiatan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jumlah" class="text-danger">Jumlah Kegiatan*</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah Kegiatan Kamu" name="jumlah" value="{{ old('jumlah') }}">
            @error ('jumlah') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="bidang" class="text-danger">Bidang Kegiatan*</label>
            <select class="form-control @error('bidang') is-invalid @enderror" id="bidang" name="bidang" value="{{ old('bidang') }}"> 
                <!-- <option selected disabled>- Pilih -</option> -->
                <option selected>{{ old('bidang') }}</option>
                <option value="Kessos">Kessos</option>
                <option value="Permasbang">Permasbang</option>
                <option value="Pem & Trantibum">Pem & Trantibum</option>
            </select>
            @error ('bidang') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tinjut" class="text-danger">Tindak Lanjut*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('tinjut') is-invalid @enderror" id="tinjut" placeholder="Tindak Lanjut Dari Kegiatan Kamu " name="tinjut" value="{{ old('tinjut') }}">
            @error ('tinjut') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="keterangan" class="text-danger"">Keterangan*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Hasil Dari Kegiatan Kamu" name="keterangan" value="{{ old('keterangan') }}">
            @error ('keterangan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="text-danger">RT*</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ old('rt_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="text-danger">RW*</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ old('rw_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="input-group mb-3">
            <label for="foto" value="{{ old('foto') }}" class="text-danger">Foto Kegiatan*</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error ('foto') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a class="btn btn-default" href="/pamor" role="button">Batal</a>
        </div>
    </form>
        </div>
    </div>

@endsection