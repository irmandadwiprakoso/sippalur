@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data KSB RT RW <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/rtrw/{{ $rtrw->id}}" method="post">
    @method('patch')
    @csrf 
    <div class="box-body">
    <div class="mb-3">
            <label for="warga_id" class="form-label">NIK</label>
            <select class="form-control @error('warga_id') is-invalid @enderror" aria-label="Default select example" id="warga_id" name="warga_id"> 
                <option selected value="{{ $rtrw->warga_id }}">{{ $rtrw->warga->NIK}}</option>
                @foreach ($warga as $penduduk)
                <option value="{{$penduduk->id}}">{{$penduduk->NIK}}</option>
                @endforeach
            </select>
            @error ('warga_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select class="form-control @error('jabatan_id') is-invalid @enderror" aria-label="Default select example" id="jabatan_id" name="jabatan_id"> 
                <option selected value="{{ $rtrw->jabatan_id }}">{{ $rtrw->jabatan->jabatan}}</option>
                @foreach ($jabatan as $jab)
                <option value="{{$jab->id}}">{{$jab->jabatan}}</option>
                @endforeach
            </select>
            @error ('jabatan_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $rtrw->rt_id }}"> 
                <option selected value="{{ $rtrw->rt_id }}">{{ $rtrw->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $rtrw->rw_id }}"> 
                <option selected value="{{ $rtrw->rw_id }}">{{ $rtrw->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_sk" class="form-label">Nomor SK Lurah/Camat</label>
            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" placeholder="No SK Lurah/Camat" name="no_sk" value="{{ $rtrw->no_sk }}">
            @error ('no_sk') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tmt" class="form-label">TMT</label>
            <input type="date" class="form-control @error('tmt') is-invalid @enderror" id="tmt" placeholder="TMT" name="tmt" value="{{ $rtrw->tmt }}">
            @error ('tmt') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" name="no_hp" value="{{ $rtrw->no_hp }}">
            @error ('no_hp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Rekening BJB" name="no_rek" value="{{ $rtrw->no_rek }}">
            @error ('no_rek') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP" name="npwp" value="{{ $rtrw->npwp }}">
            @error ('npwp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/rtrw" role="button">Cancel</a>
        </div>
        </form>
    </div>
</div>


@endsection