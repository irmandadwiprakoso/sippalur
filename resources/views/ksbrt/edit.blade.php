@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data KSB RT <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/ksbrt/{{ $ksbrt->id}}" method="post">
    @method('patch')
    @csrf 
    <div class="box-body">
    <!-- <div class="mb-3">
            <label for="ktp_id" class="form-label">NIK</label>
            <select class="form-control @error('ktp_id') is-invalid @enderror" aria-label="Default select example" id="ktp_id" name="ktp_id"> 
                <option selected value="{{ $ksbrt->ktp_id }}">{{ $ksbrt->ktp->id}}</option>
                @foreach ($ktp as $penduduk)
                <option value="{{$penduduk->id}}">{{$penduduk->id}}</option>
                @endforeach
            </select>
            @error ('ktp_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div> -->
        <h3 class="profile-username text-center">{{ $ksbrt->ktp->nama}}</h3>
        <h3 class="profile-username text-center">{{ $ksbrt->ktp->id}}</h3>
   
        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select class="form-control @error('jabatan_id') is-invalid @enderror" aria-label="Default select example" id="jabatan_id" name="jabatan_id"> 
                <option selected value="{{ $ksbrt->jabatan_id }}">{{ $ksbrt->jabatan->jabatan}}</option>
                @foreach ($jabatan as $jab)
                <option value="{{$jab->id}}">{{$jab->jabatan}}</option>
                @endforeach
            </select>
            @error ('jabatan_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $ksbrt->rt_id }}"> 
                <option selected value="{{ $ksbrt->rt_id }}">{{ $ksbrt->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $ksbrt->rw_id }}"> 
                <option selected value="{{ $ksbrt->rw_id }}">{{ $ksbrt->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_sk" class="form-label">Nomor SK Lurah/Camat</label>
            <input type="text" class="form-control @error('no_sk') is-invalid @enderror" id="no_sk" placeholder="No SK Lurah/Camat" name="no_sk" value="{{ $ksbrt->no_sk }}">
            @error ('no_sk') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tmt_mulai" class="form-label">Masa Bhakti : Mulai</label>
            <input type="date" class="form-control @error('tmt_mulai') is-invalid @enderror" id="tmt_mulai" placeholder="TMT" name="tmt_mulai" value="{{ $ksbrt->tmt_mulai }}">
            @error ('tmt_mulai') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tmt_akhir" class="form-label">Masa Bhakti : Berakhir</label>
            <input type="date" class="form-control @error('tmt_akhir') is-invalid @enderror" id="tmt_akhir" placeholder="TMT" name="tmt_akhir" value="{{ $ksbrt->tmt_akhir }}">
            @error ('tmt_akhir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" name="no_hp" value="{{ $ksbrt->no_hp }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Rekening BJB" name="no_rek" value="{{ $ksbrt->no_rek }}">
            @error ('no_rek') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP" name="npwp" value="{{ $ksbrt->npwp }}">
            @error ('npwp') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/ksbrt" role="button">Cancel</a>
        </div>
        </form>
    </div>
</div>


@endsection