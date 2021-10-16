@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data KSB RW <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/ksbrw" method="post">
    @csrf 
    <div class="box-body">
        <!-- <div class="mb-3">
            <label for="ktp_id" class="form-label">NIK Warga</label>
            <select class="form-control @error('ktp_id') is-invalid @enderror" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($ktp as $penduduk)
                <option value="{{$penduduk->id}}" {{old('ktp_id') == $penduduk->id ? 'selected' : null }}>{{$penduduk->NIK}}</option>
                @endforeach
            </select>
            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div> -->

        <div class="mb-3">
            <label for="ktp_id" class="form-label">NIK Warga</label>
            <input class="form-control @error('ktp_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih sesuai yang di inginkan" list="nik_warga" id="ktp_id" name="ktp_id" value="{{ old('ktp_id') }}"> 
                <datalist id="nik_warga">
                @foreach ($ktp as $penduduk)
                    <option value="{{$penduduk->id}}"> {{$penduduk->nama}}</option>
                    <!-- <option value="{{$penduduk->id}}" {{old('ktp_id') == $penduduk->id ? 'selected' : null }}>{{$penduduk->NIK}}</option> -->
                @endforeach
                </datalist>
            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>


        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select class="form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id" value="{{ old('jabatan_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($jabatan as $jab)
                <option value="{{$jab->id}}" {{old('jabatan_id') == $jab->id ? 'selected' : null }}>{{$jab->jabatan}}</option>
                @endforeach
            </select>
            @error ('jabatan_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
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
            <label for="no_sk" class="form-label">No SK Lurah/Camat</label>
            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" name="no_sk" placeholder="No SK Lurah/Camat" value="{{ old('no_sk') }}">
            @error ('no_sk') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
    
        <div class="mb-3">
            <label for="tmt_mulai" class="form-label">Masa Bhakti : Mulai</label>
            <input type="date" class="form-control @error('tmt_mulai') is-invalid @enderror" id="tmt_mulai" placeholder="TMT Jabatan" name="tmt_mulai" value="{{ old('tmt_mulai') }}">
            @error ('tmt_mulai') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tmt_akhir" class="form-label">Masa Bhakti : Berakhir</label>
            <input type="date" class="form-control @error('tmt_akhir') is-invalid @enderror" id="tmt_akhir" placeholder="TMT Jabatan" name="tmt_akhir" value="{{ old('tmt_akhir') }}">
            @error ('tmt_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">No Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" name="no_rek" placeholder="Rekening BJB" value="{{ old('no_rek') }}">
            @error ('no_rek') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" placeholder="NPWP" value="{{ old('npwp') }}">
            @error ('npwp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>


        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/ksbrw" role="button">Cancel</a>
        </div>
    </form>
</div>
</div>


@endsection