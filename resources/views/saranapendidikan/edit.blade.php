@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data Sarana Pendidikan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/pendidikan/{{ $pendidikan->id }}" method="post">
    @method('patch')
    @csrf 
    <div class="box-body">
                <div class="mb-3">
                <label for="nama_sarana_pendidikan" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_sarana_pendidikan') is-invalid @enderror" id="nama_sarana_pendidikan" placeholder="Nama Sarana Pendidikan" name="nama_sarana_pendidikan" value="{{ $pendidikan->nama_sarana_pendidikan }}">
            @error('nama_sarana_pendidikan') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tipependidikan_id" class="form-label">Tipe</label>
            <select class="form-control @error('tipependidikan_id') is-invalid @enderror" aria-label="Default select example" id="tipependidikan_id" name="tipependidikan_id" value="{{ $pendidikan->tipependidikan_id }}"> 
                <option selected value="{{ $pendidikan->tipependidikan_id }}">{{ $pendidikan->tipependidikan->tipependidikan}}</option>
                @foreach ($tipependidikan as $tipe)
                <option value="{{$tipe->id}}">{{$tipe->tipependidikan}}</option>
                @endforeach
            </select>
            @error ('tipependidikan_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ $pendidikan->alamat }}">
            @error('alamat') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $pendidikan->rt_id }}"> 
                <option selected value="{{ $pendidikan->rt_id }}">{{ $pendidikan->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $pendidikan->rw_id }}"> 
                <option selected value="{{ $pendidikan->rw_id }}">{{ $pendidikan->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan </label>
            <input type="text" class="form-control @error('nama_pimpinan') is-invalid @enderror" id="nama_pimpinan" placeholder="Nama Pimpinan Sarana Pendidikan" name="nama_pimpinan" value="{{ $pendidikan->nama_pimpinan }}">
            @error ('nama_pimpinan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="status_lahan" class="form-label">Status Lahan</label>
            <select class="form-control @error('status_lahan') is-invalid @enderror" aria-label="Default select example" id="status_lahan" name="status_lahan" value="{{ $pendidikan->status_lahan }}"> 
                <option selected value="{{ $pendidikan->status_lahan }}">{{ $pendidikan->status_lahan}}</option>
                <option value="SHM">SERTIPIKAT HAK MILIK</option>
                <option value="SHGB">SERTIPIKAT HAK GUNA BANGUNAN</option>
                <option value="AJB">AKTA JUAL BELI</option>
                <option value="GIRIK">GIRIK</option>
                <option value="HIBAH">HIBAH</option>
                <option value="FASOS/FASUM">FASOS/FASUM</option>
                <option value="WAKAF">WAKAF</option>
            </select>
            @error ('status_lahan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" name="no_hp" value="{{ $pendidikan->no_hp }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
                <button type="submit" class="btn btn-success">Update Data</button>
                <a class="btn btn-default" href="/pendidikan" role="button">Close</a>
        </div>

            </form>
            </div>
            </div>
@endsection