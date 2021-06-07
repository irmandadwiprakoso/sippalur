@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/covid19/{{ $covid19->id}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">
    <div class="mb-3">
            <label for="warga_id" class="form-label">NIK</label>
            <select class="form-control @error('warga_id') is-invalid @enderror" aria-label="Default select example" id="warga_id" name="warga_id"> 
                <option selected value="{{ $covid19->warga_id }}">{{ $covid19->warga->NIK}}</option>
                @foreach ($warga as $penduduk)
                <option value="{{$penduduk->id}}">{{$penduduk->NIK}}</option>
                @endforeach
            </select>
            @error ('warga_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="konfirmasi" class="form-label">Tanggal Konfirmasi</label>
            <input type="date" class="form-control @error('konfirmasi') is-invalid @enderror" id="konfirmasi" placeholder="Tanggal Lahir Anda" name="konfirmasi" value="{{ $covid19->konfirmasi }}">
            @error ('konfirmasi') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_pasien" class="form-label">Status Pasien</label>
            <select class="form-control @error('status_pasien') is-invalid @enderror" aria-label="Default select example" id="status_pasien" name="status_pasien" value="{{ $covid19->status_pasien }}"> 
                <option selected value="{{ $covid19->status_pasien }}">{{ $covid19->status_pasien}}</option>
                <option value="ISOMAN">ISOMAN</option>
                <option value="DIRAWAT">DIRAWAT</option>
            </select>
            @error ('status_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="lokasi_pasien" class="form-label">Lokasi Pasien</label>
            <input type="text" class="form-control @error('lokasi_pasien') is-invalid @enderror" id="lokasi_pasien" placeholder="Nomor HP Anda" name="lokasi_pasien" value="{{ $covid19->lokasi_pasien }}">
            @error ('lokasi_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tanggal_status" class="form-label">Tanggal Status</label>
            <input type="date" class="form-control @error('tanggal_status') is-invalid @enderror" id="tanggal_status" placeholder="Tanggal Lahir Anda" name="tanggal_status" value="{{ $covid19->tanggal_status }}">
            @error ('tanggal_status') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_akhir" class="form-label">Status Akhir Pasien</label>
            <select class="form-control @error('status_akhir') is-invalid @enderror" aria-label="Default select example" id="status_akhir" name="status_akhir" value="{{ $covid19->status_akhir }}"> 
                <option selected value="{{ $covid19->status_akhir }}">{{ $covid19->status_akhir}}</option>
                <option value="Positif">POSITIF</option>
                <option value="Negatif">NEGATIF</option>
            </select>
            @error ('status_akhir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_status_akhir" class="form-label">Tanggal Status Akhir</label>
            <input type="date" class="form-control @error('tanggal_status_akhir') is-invalid @enderror" id="tanggal_status_akhir" placeholder="Tanggal Lahir Anda" name="tanggal_status_akhir" value="{{ $covid19->tanggal_status_akhir }}">
            @error ('tanggal_status_akhir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP Pasien/Penanggungjawab</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="Nomor HP Anda" name="no_hp" value="{{ $covid19->no_hp }}">
            @error ('no_hp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="input-group mb-3">
        <label for="foto_status_pasien">Foto Status Pasien</label>
            <input type="file" class="form-control @error('foto_status_pasien') is-invalid @enderror" id="foto_status_pasien" name="foto_status_pasien" value="{{ $covid19->foto_status_pasien }}">
            @error ('foto_status_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
                <img src="{{asset('images/'.$covid19->foto_status_pasien)}}" height="20%" width="20%"></img>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/covid19" role="button">Cancel</a>
        </div>
</form>
        </div>
    </div>


@endsection