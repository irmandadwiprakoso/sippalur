@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data KSB RT RW <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/rtrw" method="post">
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
            @error ('warga_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div> -->

        <div class="mb-3">
            <label for="warga_id" class="form-label">NIK Warga</label>
            <input class="form-control @error('warga_id') is-invalid @enderror" placeholder="Ketik NIK/Nama, pilih sesuai yang di inginkan" list="nik_warga" id="warga_id" name="warga_id" value="{{ old('warga_id') }}"> 
                <datalist id="nik_warga">
                @foreach ($warga as $penduduk)
                    <option value="{{$penduduk->id}}">{{$penduduk->NIK}} - {{$penduduk->nama}}</option>
                    <!-- <option value="{{$penduduk->id}}" {{old('warga_id') == $penduduk->id ? 'selected' : null }}>{{$penduduk->NIK}}</option> -->
                @endforeach
                </datalist>
            @error ('warga_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>


        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select class="form-control @error('jabatan_id') is-invalid @enderror" id="jabatan_id" name="jabatan_id" value="{{ old('jabatan_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($jabatan as $jab)
                <option value="{{$jab->id}}" {{old('jabatan_id') == $jab->id ? 'selected' : null }}>{{$jab->jabatan}}</option>
                @endforeach
            </select>
            @error ('jabatan_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
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
            <label for="no_sk" class="form-label">No SK Lurah/Camat</label>
            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" name="no_sk" placeholder="No SK Lurah/Camat" value="{{ old('no_sk') }}">
            @error ('no_sk') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
    
        <div class="mb-3">
            <label for="tmt" class="form-label">TMT</label>
            <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt" placeholder="TMT Jabatan" name="tmt" value="{{ old('tmt') }}">
            @error ('tmt') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}">
            @error ('no_hp') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">No Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" name="no_rek" placeholder="Rekening BJB" value="{{ old('no_rek') }}">
            @error ('no_rek') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" name="npwp" placeholder="NPWP" value="{{ old('npwp') }}">
            @error ('npwp') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>


        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/rtrw" role="button">Cancel</a>
        </div>
    </form>
</div>
</div>


@endsection