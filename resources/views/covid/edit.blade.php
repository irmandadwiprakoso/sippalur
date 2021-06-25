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
            <label for="domisili" class="form-label">Domisili Tempat Tinggal</label>
            <input type="text" class="form-control @error('domisili') is-invalid @enderror" id="domisili" placeholder="Tanggal Lahir Anda" name="domisili" value="{{ $covid19->domisili }}">
            @error ('domisili') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $covid19->rt_id }}"> 
                <option selected value="{{ $covid19->rt_id }}">{{ $covid19->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $covid19->rw_id }}"> 
                <option selected value="{{ $covid19->rw_id }}">{{ $covid19->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
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
                <option value="Isoman">ISOLASI MANDIRI</option>
                <option value="Perawatan">DIRAWAT</option>
            </select>
            @error ('status_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="lokasi_pasien" class="form-label">Lokasi Pasien</label>
            <input type="text" class="form-control @error('lokasi_pasien') is-invalid @enderror" id="lokasi_pasien" placeholder="Nama Rumah Sakit/Tempat Pasien dirawat" name="lokasi_pasien" value="{{ $covid19->lokasi_pasien }}">
            @error ('lokasi_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <!-- <div class="mb-3">
            <label for="tanggal_status" class="form-label">Tanggal Status</label>
            <input type="date" class="form-control @error('tanggal_status') is-invalid @enderror" id="tanggal_status" placeholder="Tanggal Status" name="tanggal_status" value="{{ $covid19->tanggal_status }}">
            @error ('tanggal_status') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div> -->

        <div class="mb-3">
            <label for="hasil_test" class="form-label">Hasil Test</label>
            <select class="form-control @error('hasil_test') is-invalid @enderror" aria-label="Default select example" id="hasil_test" name="hasil_test" value="{{ $covid19->hasil_test }}"> 
                <option selected value="{{ $covid19->hasil_test }}">{{ $covid19->hasil_test}}</option>
                <option value="TCM">TCM</option>
                <option value="PCR">PCR</option>
                <option value="Rapid Antibodi">Rapid Antibodi</option>
                <option value="Rapid Antigen">Rapid Antigen</option>
                <option value="GeNose">GeNose</option>
            </select>
            @error ('hasil_test') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tglmonitoring1" class="form-label">Tanggal Monitoring 1</label>
            <input type="date" class="form-control @error('tglmonitoring1') is-invalid @enderror" id="tglmonitoring1"  name="tglmonitoring1" value="{{ $covid19->tglmonitoring1 }}">
            @error ('tglmonitoring1') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="monitoring1" class="form-label">Monitoring 1</label>
            <input type="text" class="form-control @error('monitoring1') is-invalid @enderror" id="monitoring1" placeholder="Kegiatan Monitoring" name="monitoring1" value="{{ $covid19->monitoring1 }}">
            @error ('monitoring1') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tglmonitoring2" class="form-label">Tanggal Monitoring 2</label>
            <input type="date" class="form-control @error('tglmonitoring2') is-invalid @enderror" id="tglmonitoring2"  name="tglmonitoring2" value="{{ $covid19->tglmonitoring2 }}">
            @error ('tglmonitoring2') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="monitoring2" class="form-label">Monitoring 2</label>
            <input type="text" class="form-control @error('monitoring2') is-invalid @enderror" id="monitoring2" placeholder="Kegiatan Monitoring" name="monitoring2" value="{{ $covid19->monitoring2 }}">
            @error ('monitoring2') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tglmonitoring3" class="form-label">Tanggal Monitoring 3</label>
            <input type="date" class="form-control @error('tglmonitoring3') is-invalid @enderror" id="tglmonitoring3"  name="tglmonitoring3" value="{{ $covid19->tglmonitoring3 }}">
            @error ('tglmonitoring3') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="mb-3">
            <label for="monitoring3" class="form-label">Monitoring 3</label>
            <input type="text" class="form-control @error('monitoring3') is-invalid @enderror" id="monitoring3" placeholder="Kegiatan Monitoring" name="monitoring3" value="{{ $covid19->monitoring3 }}">
            @error ('monitoring3') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="status_akhir" class="form-label">Status Akhir Pasien</label>
            <select class="form-control @error('status_akhir') is-invalid @enderror" aria-label="Default select example" id="status_akhir" name="status_akhir" value="{{ $covid19->status_akhir }}"> 
                <option selected value="{{ $covid19->status_akhir }}">{{ $covid19->status_akhir}}</option>
                <option value="Positif">POSITIF</option>
                <option value="Negatif">NEGATIF</option>
                <option value="Meninggal">MENINGGAL</option>
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
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP Pasien/Penanggung Jawab" name="no_hp" value="{{ $covid19->no_hp }}">
            @error ('no_hp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tinjut" class="form-label">Tindak Lanjut Kelurahan</label>
            <input type="text" class="form-control @error('tinjut') is-invalid @enderror" id="tinjut" placeholder="Tindak Lanjut Kelurahan" name="tinjut" value="{{ $covid19->tinjut }}">
            @error ('tinjut') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Hasil Tindak Lanjut</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Hasil Tindak Lanjut" name="keterangan" value="{{ $covid19->keterangan }}">
            @error ('keterangan') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="sumbercovid" class="form-label">Sumber Pasien Terpapar Covid</label>
            <input type="text" class="form-control @error('sumbercovid') is-invalid @enderror" id="sumbercovid" placeholder="Sumber Pasien Terpapar Covid" name="sumbercovid" value="{{ $covid19->sumbercovid }}">
            @error ('sumbercovid') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="input-group mb-3">
        <label for="foto_KTP">Foto KTP Pasien</label>
            <input type="file" class="form-control @error('foto_KTP') is-invalid @enderror" id="foto_KTP" name="foto_KTP" value="{{ $covid19->foto_KTP }}">
            @error ('foto_KTP') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/KTP/'.$covid19->foto_KTP)}}" height="20%" width="20%"></img>
        </div>

        <div class="input-group mb-3">
        <label for="foto_KK">Foto KK Pasien</label>
            <input type="file" class="form-control @error('foto_KK') is-invalid @enderror" id="foto_KK" name="foto_KK" value="{{ $covid19->foto_KK }}">
            @error ('foto_KK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/KK/'.$covid19->foto_KK)}}" height="20%" width="20%"></img>
        </div>

        <div class="input-group mb-3">
        <label for="foto_status_pasien">Foto Status Pasien</label>
            <input type="file" class="form-control @error('foto_status_pasien') is-invalid @enderror" id="foto_status_pasien" name="foto_status_pasien" value="{{ $covid19->foto_status_pasien }}">
            @error ('foto_status_pasien') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/StatusAwalPasien/'.$covid19->foto_status_pasien)}}" height="20%" width="20%"></img>
        </div>

        <div class="input-group mb-3">
        <label for="foto_status_akhir">Foto Status Akhir Pasien</label>
            <input type="file" class="form-control @error('foto_status_akhir') is-invalid @enderror" id="foto_status_akhir" name="foto_status_akhir" value="{{ $covid19->foto_status_akhir }}">
            @error ('foto_status_akhir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/StatusAkhirPasien/'.$covid19->foto_status_akhir)}}" height="20%" width="20%"></img>
        </div>

        <div class="input-group mb-3">
        <label for="fotomonitoring1">Foto Monitoring 1</label>
            <input type="file" class="form-control @error('fotomonitoring1') is-invalid @enderror" id="fotomonitoring1" name="fotomonitoring1" value="{{ $covid19->fotomonitoring1 }}">
            @error ('fotomonitoring1') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/Monitoring1/'.$covid19->fotomonitoring1)}}" height="20%" width="20%"></img>
        </div>

        <div class="input-group mb-3">
        <label for="fotomonitoring2">Foto Monitoring 2</label>
            <input type="file" class="form-control @error('fotomonitoring2') is-invalid @enderror" id="fotomonitoring2" name="fotomonitoring2" value="{{ $covid19->fotomonitoring2 }}">
            @error ('fotomonitoring2') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/Monitoring2/'.$covid19->fotomonitoring2)}}" height="20%" width="20%"></img>
        </div>

        <div class="input-group mb-3">
        <label for="fotomonitoring3">Foto Monitoring 3</label>
            <input type="file" class="form-control @error('fotomonitoring3') is-invalid @enderror" id="fotomonitoring3" name="fotomonitoring3" value="{{ $covid19->fotomonitoring3 }}">
            @error ('fotomonitoring3') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        <div class="input-group mb-3">
                <img src="{{asset('images/Covid19/Monitoring3/'.$covid19->fotomonitoring3)}}" height="20%" width="20%"></img>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/covid19" role="button">Cancel</a>
        </div>
</form>
        </div>
    </div>


@endsection