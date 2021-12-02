@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data Sarana Ibadah <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/ibadah/{{ $ibadah->id }}" method="post">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama_sarana_ibadah" class="form-label">Nama</label>
                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama_sarana_ibadah') is-invalid @enderror" id="nama_sarana_ibadah" placeholder="Nama Sarana Ibadah" name="nama_sarana_ibadah" value="{{ $ibadah->nama_sarana_ibadah }}">
            @error('nama_sarana_ibadah') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tipeibadah_id" class="form-label">Tipe</label>
            <select class="form-control @error('tipeibadah_id') is-invalid @enderror" aria-label="Default select example" id="tipeibadah_id" name="tipeibadah_id" value="{{ $ibadah->tipeibadah_id }}"> 
                <option selected value="{{ $ibadah->tipeibadah_id }}">{{ $ibadah->tipeibadah->tipeibadah}}</option>
                @foreach ($tipeibadah as $tipe)
                <option value="{{$tipe->id}}">{{$tipe->tipeibadah}}</option>
                @endforeach
            </select>
            @error ('tipeibadah_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat" name="alamat" value="{{ $ibadah->alamat }}">
            @error('alamat') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $ibadah->rt_id }}"> 
                <option selected value="{{ $ibadah->rt_id }}">{{ $ibadah->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $ibadah->rw_id }}"> 
                <option selected value="{{ $ibadah->rw_id }}">{{ $ibadah->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="nama_pimpinan" class="form-label">Nama Pimpinan </label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama_pimpinan') is-invalid @enderror" id="nama_pimpinan" placeholder="Nama Pimpinan Sarana Ibadah" name="nama_pimpinan" value="{{ $ibadah->nama_pimpinan }}">
            @error ('nama_pimpinan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="status_lahan" class="form-label">Status Lahan</label>
            <select class="form-control @error('status_lahan') is-invalid @enderror" aria-label="Default select example" id="status_lahan" name="status_lahan" value="{{ $ibadah->status_lahan }}"> 
                <option selected value="{{ $ibadah->status_lahan }}">{{ $ibadah->status_lahan}}</option>
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
            <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" name="no_hp" value="{{ $ibadah->no_hp }}">
            @error ('no_hp') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/ibadah" role="button">Batal</a>
        </div>

</form>
    </div>
</div>

@endsection