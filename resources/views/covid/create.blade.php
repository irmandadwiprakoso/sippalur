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
            <label for="ktp_id" class="text-danger">NIK Pasien*</label>
            <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama Pasien" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                <datalist id="nik_warga">
                @foreach ($ktp as $penduduk)
                    <option value="{{$penduduk->id}}">{{$penduduk->nama}}</option>
                @endforeach
                </datalist>
            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
            <label for="foto_KTP" value="{{ old('foto_KTP') }}" class="text-danger">Foto KTP Pasien*</label>
            <input type="file" class="form-control @error('foto_KTP') is-invalid @enderror" id="foto_KTP" name="foto_KTP" value="{{ old('foto_KTP') }}">
            @error ('foto_KTP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
            
        </div>

        <div class="input-group mb-3">
            <label for="foto_KK" value="{{ old('foto_KK') }}" class="text-danger">Foto KK Pasien*</label>
            <input type="file" class="form-control @error('foto_KK') is-invalid @enderror" id="foto_KK" name="foto_KK">
            @error ('foto_KK') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="domisili" class="text-danger" >Domisili Tempat Tinggal Pasien*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('domisili') is-invalid @enderror" id="domisili" placeholder="Domisili Tempat Tinggal Pasien" name="domisili" value="{{ old('domisili') }}">
            @error ('domisili') <div class="alert alert-danger">{{ $message }} </div>@enderror 
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

        <div class="mb-3">
            <label for="konfirmasi" class="text-danger">Tanggal Konfirmasi*</label>
            <input type="date" class="form-control @error('konfirmasi') is-invalid @enderror" id="konfirmasi" placeholder="Tanggal Konfirmasi" name="konfirmasi" value="{{ old('konfirmasi') }}">
            @error ('konfirmasi') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_pasien" class="text-danger">Status Pasien*</label>
            <select class="form-control @error('status_pasien') is-invalid @enderror" id="status_pasien" placeholder="Status Pasien Saat ini" name="status_pasien" > 
                <option selected>{{ old('status_pasien') }}</option>
                <option value="Isoman">ISOLASI MANDIRI</option>
                <option value="Perawatan">DIRAWAT</option>
            </select>
            @error ('status_pasien') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="lokasi_pasien" class="text-danger">Lokasi Pasien*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('lokasi_pasien') is-invalid @enderror" id="lokasi_pasien" placeholder="Nama Rumah Sakit/Tempat Pasien dirawat" name="lokasi_pasien" value="{{ old('lokasi_pasien') }}">
            @error ('lokasi_pasien') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
            <label for="foto_status_pasien" value="{{ old('foto_status_pasien') }}" class="text-danger">Hasil Test Pasien*</label>
            <input type="file" class="form-control @error('foto_status_pasien') is-invalid @enderror" id="foto_status_pasien" name="foto_status_pasien">
            @error ('foto_status_pasien') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="hasil_test" class="text-danger">Sumber Hasil Test Pasien*</label>
            <select class="form-control @error('hasil_test') is-invalid @enderror" id="hasil_test" name="hasil_test" placeholder="Hasil Test"> 
                <option selected >{{ old('hasil_test') }}</option>
                <option value="PCR">PCR</option>
                <option value="Rapid Antibodi">Rapid Antibodi</option>
                <option value="Rapid Antigen">Rapid Antigen</option>
            </select>
            @error ('hasil_test') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_akhir" class="text-danger">Status Akhir Pasien Saat Ini*</label>
            <select class="form-control @error('status_akhir') is-invalid @enderror" id="status_akhir" name="status_akhir" value=""> 
                <!-- <option selected disabled>- Pilih -</option> -->
                <option selected>{{ old('status_akhir') }}</option>
                <option value="Positif">POSITIF</option>
                <option value="Negatif">NEGATIF</option>
                <option value="Meninggal">MENINGGAL</option>
            </select>
            @error ('status_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_status_akhir"class="text-danger">Tanggal Status Akhir Pasien*</label>
            <input type="date" class="form-control @error('tanggal_status_akhir') is-invalid @enderror" id="tanggal_status_akhir" name="tanggal_status_akhir" value="{{ old('tanggal_status_akhir') }}">
            @error ('tanggal_status_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <!-- <div class="input-group mb-3">
            <label for="foto_status_akhir" value="{{ old('foto_status_akhir') }}" >Hasil Test Akhir Pasien</label>
            <input type="file" class="form-control @error('foto_status_akhir') is-invalid @enderror" id="foto_status_akhir" name="foto_status_akhir">
            @error ('foto_status_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div> -->

        <div class="mb-3">
            <label for="no_hp" class="text-danger">No HP Pasien/Penanggung Jawab*</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP Pasien/Penanggung Jawab" name="no_hp" value="{{ old('no_hp') }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tinjut" class="text-danger">Tindak Lanjut*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('tinjut') is-invalid @enderror" id="tinjut" placeholder="Tindak Lanjut Kelurahan/Pamor" name="tinjut" value="{{ old('tinjut') }}">
            @error ('tinjut') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="keterangan" class="text-danger">Keterangan*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Hasil Tindak Lanjut Kelurahan/Pamor" name="keterangan" value="{{ old('keterangan') }}">
            @error ('keterangan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="sumbercovid" class="text-danger">Sumber Pasien Terpapar Covid*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('sumbercovid') is-invalid @enderror" id="sumbercovid" placeholder="Sumber Pasien Terpapar Covid-19" name="sumbercovid" value="{{ old('sumbercovid') }}">
            @error ('sumbercovid') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a class="btn btn-default" href="/covid19" role="button">Batal</a>
        </div>
    </form>
        </div>
    </div>

@endsection