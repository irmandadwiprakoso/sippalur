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
        <!-- <div class="mb-3">
            <label for="warga_id" class="form-label">NIK Warga</label>
            <select class="form-control @error('warga_id') is-invalid @enderror" id="warga_id" name="warga_id" value="{{ old('warga_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($warga as $penduduk)
                <option value="{{$penduduk->id}}" {{old('warga_id') == $penduduk->id ? 'selected' : null }}>{{$penduduk->NIK}}</option>
                @endforeach
            </select>
            @error ('warga_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div> -->
        
        <div class="mb-3">
            <label for="warga_id" class="form-label">NIK Warga</label>
            <input class="form-control @error('warga_id') is-invalid @enderror" placeholder="Ketik NIK/Nama Warga Anda" list="nik_warga" id="warga_id" name="warga_id" value="{{ old('warga_id') }}"> 
                <datalist id="nik_warga">
                @foreach ($warga as $penduduk)
                    <option value="{{$penduduk->id}}">{{$penduduk->NIK}}-{{$penduduk->nama}}</option>
                @endforeach
                </datalist>
            @error ('warga_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
            <label for="foto_KTP" value="{{ old('foto_KTP') }}">Foto KTP Pasien</label>
            <input type="file" class="form-control @error('foto_KTP') is-invalid @enderror" id="foto_KTP" name="foto_KTP" value="{{ old('foto_KTP') }}">
            @error ('foto_KTP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
            
        </div>

        <div class="input-group mb-3">
            <label for="foto_KK" value="{{ old('foto_KK') }}">Foto KK Pasien</label>
            <input type="file" class="form-control @error('foto_KK') is-invalid @enderror" id="foto_KK" name="foto_KK">
            @error ('foto_KK') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="domisili" class="form-label">Domisili Tempat Tinggal Pasien</label>
            <input type="text" class="form-control @error('domisili') is-invalid @enderror" id="domisili" placeholder="Domisili Tempat Tinggal Pasien" name="domisili" value="{{ old('domisili') }}">
            @error ('domisili') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ old('rt_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ old('rw_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="konfirmasi" class="form-label">Tanggal Konfirmasi</label>
            <input type="date" class="form-control @error('konfirmasi') is-invalid @enderror" id="konfirmasi" placeholder="Tanggal Konfirmasi" name="konfirmasi" value="{{ old('konfirmasi') }}">
            @error ('konfirmasi') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_pasien" class="form-label">Status Pasien Saat Ini</label>
            <select class="form-control @error('status_pasien') is-invalid @enderror" id="status_pasien" name="status_pasien" > 
                <option selected>{{ old('status_pasien') }}</option>
                <option value="Isoman">ISOLASI MANDIRI</option>
                <option value="Perawatan">DIRAWAT</option>
            </select>
            @error ('status_pasien') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="lokasi_pasien" class="form-label">Lokasi Pasien Saat Ini</label>
            <input type="text" class="form-control @error('lokasi_pasien') is-invalid @enderror" id="lokasi_pasien" placeholder="Nama Rumah Sakit/Tempat Pasien dirawat" name="lokasi_pasien" value="{{ old('lokasi_pasien') }}">
            @error ('lokasi_pasien') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
            <label for="foto_status_pasien" value="{{ old('foto_status_pasien') }}">Hasil Test Pasien</label>
            <input type="file" class="form-control @error('foto_status_pasien') is-invalid @enderror" id="foto_status_pasien" name="foto_status_pasien">
            @error ('foto_status_pasien') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="hasil_test" class="form-label">Sumber Hasil Test Pasien</label>
            <select class="form-control @error('hasil_test') is-invalid @enderror" id="hasil_test" name="hasil_test" placeholder="Hasil Test"> 
                <option selected >{{ old('hasil_test') }}</option>
                <option value="TCM">TCM</option>
                <option value="PCR">PCR</option>
                <option value="Rapid Antibodi">Rapid Antibodi</option>
                <option value="Rapid Antigen">Rapid Antigen</option>
                <option value="GeNose">GeNose</option>
            </select>
            @error ('hasil_test') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_akhir" class="form-label">Status Akhir Pasien Saat Ini</label>
            <select class="form-control @error('status_akhir') is-invalid @enderror" id="status_akhir" name="status_akhir" value=""> 
                <!-- <option selected disabled>- Pilih -</option> -->
                <option selected>{{ old('status_akhir') }}</option>
                <option value="Positif">POSITIF</option>
                <option value="Negatif">NEGATIF</option>
                <option value="Meniggal">MENINGGAL</option>
            </select>
            @error ('status_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_status_akhir" class="form-label">Tanggal Status Akhir Pasien Saat Ini</label>
            <input type="date" class="form-control @error('tanggal_status_akhir') is-invalid @enderror" id="tanggal_status_akhir" name="tanggal_status_akhir" value="{{ old('tanggal_status_akhir') }}">
            @error ('tanggal_status_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
            <label for="foto_status_akhir" value="{{ old('foto_status_akhir') }}">Hasil Test Akhir Pasien</label>
            <input type="file" class="form-control @error('foto_status_akhir') is-invalid @enderror" id="foto_status_akhir" name="foto_status_akhir">
            @error ('foto_status_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP Pasien/Penanggung Jawab</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP Pasien/Penanggung Jawab" name="no_hp" value="{{ old('no_hp') }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tinjut" class="form-label">Tindak Lanjut Kelurahan</label>
            <input type="text" class="form-control @error('tinjut') is-invalid @enderror" id="tinjut" placeholder="Tindak Lanjut Kelurahan" name="tinjut" value="{{ old('tinjut') }}">
            @error ('tinjut') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Hasil Tindak Lanjut Kelurahan" name="keterangan" value="{{ old('keterangan') }}">
            @error ('keterangan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="sumbercovid" class="form-label">Sumber Pasien Terpapar Covid</label>
            <input type="text" class="form-control @error('sumbercovid') is-invalid @enderror" id="sumbercovid" placeholder="Sumber Pasien Bisa Terpapar Covid-19" name="sumbercovid" value="{{ old('sumbercovid') }}">
            @error ('sumbercovid') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
<!-- 
        <div class="mb-3">
            <label for="tglmonitoring1" class="form-label">Tanggal Monitoring 1</label>
            <input type="date" class="form-control @error('tglmonitoring1') is-invalid @enderror" id="tglmonitoring1" placeholder="Monitoring pertama yang dilakukan" name="tglmonitoring1" value="{{ old('tglmonitoring1') }}">
            @error ('tglmonitoring1') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="monitoring1" class="form-label">Monitoring 1</label>
            <input type="text" class="form-control @error('monitoring1') is-invalid @enderror" id="monitoring1" placeholder="Monitoring 1" name="monitoring1" value="{{ old('monitoring1') }}">
            @error ('monitoring1') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
            <label for="fotomonitoring1" value="{{ old('fotomonitoring1') }}">Foto Monitoring 1</label>
            <input type="file" class="form-control @error('fotomonitoring1') is-invalid @enderror" id="fotomonitoring1" name="fotomonitoring1">
            @error ('fotomonitoring1') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tglmonitoring2" class="form-label">Tanggal Monitoring 2</label>
            <input type="date" class="form-control @error('tglmonitoring2') is-invalid @enderror" id="tglmonitoring2" placeholder="Monitoring pertama yang dilakukan" name="tglmonitoring2" value="{{ old('tglmonitoring2') }}">
            @error ('tglmonitoring2') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="monitoring2" class="form-label">Monitoring 2</label>
            <input type="text" class="form-control @error('monitoring2') is-invalid @enderror" id="monitoring2" placeholder="Monitoring 2" name="monitoring2" value="{{ old('monitoring2') }}">
            @error ('monitoring2') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
            <label for="fotomonitoring2" value="{{ old('fotomonitoring2') }}">Foto Monitoring 2</label>
            <input type="file" class="form-control @error('fotomonitoring2') is-invalid @enderror" id="fotomonitoring2" name="fotomonitoring2">
            @error ('fotomonitoring2') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tglmonitoring3" class="form-label">Tanggal Monitoring 3</label>
            <input type="date" class="form-control @error('tglmonitoring3') is-invalid @enderror" id="tglmonitoring3" placeholder="Monitoring pertama yang dilakukan" name="tglmonitoring3" value="{{ old('tglmonitoring3') }}">
            @error ('tglmonitoring3') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="monitoring3" class="form-label">Monitoring 3</label>
            <input type="text" class="form-control @error('monitoring3') is-invalid @enderror" id="monitoring3" placeholder="Monitoring 3" name="monitoring3" value="{{ old('monitoring3') }}">
            @error ('monitoring3') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
            <label for="fotomonitoring3" value="{{ old('fotomonitoring3') }}">Foto Monitoring 3</label>
            <input type="file" class="form-control @error('fotomonitoring3') is-invalid @enderror" id="fotomonitoring3" name="fotomonitoring3">
            @error ('fotomonitoring3') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
 -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/covid19" role="button">Cancel</a>
        </div>
    </form>
        </div>
    </div>

@endsection