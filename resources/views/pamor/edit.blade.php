@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Laporan Kegiatan Harian Satgas Pamor <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/pamor/{{ $pamor->id}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="Tanggal Kegiatan" name="tanggal" value="{{ $pamor->tanggal }}">
            @error ('tanggal') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan Pamor</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" placeholder="Kegiatan Anda" name="kegiatan" value="{{ $pamor->kegiatan }}">
            @error ('kegiatan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Kegiatan</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah Laporan Anda" name="jumlah" value="{{ $pamor->jumlah }}">
            @error ('jumlah') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="bidang" class="form-label">Bidang Kegiatan</label>
            <select class="form-control @error('bidang') is-invalid @enderror" aria-label="Default select example" id="bidang" name="bidang" value="{{ $pamor->bidang }}"> 
                <option selected value="{{ $pamor->bidang }}">{{ $pamor->bidang}}</option>
                <option value="Kessos">Kessos</option>
                <option value="Permasbang">Permasbang</option>
                <option value="Pem & Trantibum">Pem & Trantibum</option>
            </select>
            @error ('bidang') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tinjut" class="form-label">Tindak Lanjut</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('tinjut') is-invalid @enderror" id="tinjut" placeholder="Keterangan Laporan Anda" name="tinjut" value="{{ $pamor->tinjut }}">
            @error ('tinjut') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Keterangan Laporan Anda" name="keterangan" value="{{ $pamor->keterangan }}">
            @error ('keterangan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $pamor->rt_id }}"> 
                <option selected value="{{ $pamor->rt_id }}">{{ $pamor->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $pamor->rw_id }}"> 
                <option selected value="{{ $pamor->rw_id }}">{{ $pamor->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
        <label for="foto">Foto Kegiatan</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ $pamor->foto }}">
            @error ('foto') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
                <img src="{{asset('images/LaporanHarian/'.$pamor->foto)}}" height="50%" width="50%"></img>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/pamor" role="button">Cancel</a>
        </div>
</form>
        </div>
    </div>


@endsection