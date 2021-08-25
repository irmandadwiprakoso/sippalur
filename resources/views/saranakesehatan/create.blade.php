@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data Sarana Kesehatan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/kesehatan" method="post">
    @csrf 
        <!-- <div class="mb-3"> -->
        <div class="box-body">
                <div class="form-group">
                <label for="nama_sarana_kesehatan" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_sarana_kesehatan') is-invalid @enderror" id="nama_sarana_ibadah" placeholder="Nama Sarana Kesehatan" name="nama_sarana_kesehatan" value="{{ old('nama_sarana_kesehatan') }}">
            @error('nama_sarana_kesehatan') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tipekesehatan_id" class="form-label">Tipe</label>
            <select class="form-control @error('tipekesehatan_id') is-invalid @enderror" id="tipekesehatan_id" name="tipekesehatan_id" value="{{ old('tipekesehatan_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($tipekesehatan as $tipe)
                <option value="{{$tipe->id}}" {{old('tipekesehatan_id') == $tipe->id ? 'selected' : null }}>{{$tipe->tipekesehatan}}</option>
                @endforeach
            </select>
            @error ('tipekesehatan_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}">
            @error('alamat') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror"  id="rt_id" name="rt_id" value="{{ old('rt_id') }}"> 
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
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan </label>
            <input type="text" class="form-control @error('nama_pimpinan') is-invalid @enderror" id="nama_pimpinan" placeholder="Nama Pimpinan Sarana Kesehatan" name="nama_pimpinan" value="{{ old('nama_pimpinan') }}">
            @error ('nama_pimpinan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="status_lahan" class="form-label">Status Lahan</label>
            <select class="form-control @error('status_lahan') is-invalid @enderror" id="status_lahan" name="status_lahan" value="{{ old('status_lahan') }}"> 
                <option selected disabled>- Pilih -</option>
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
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" name="no_hp" value="{{ old('no_hp') }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/kesehatan" role="button">Close</a>
        </div>
        
</form>
        </div>
    </div>


@endsection