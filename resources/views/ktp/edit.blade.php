@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data KTP <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/ktp/{{$ktp->id}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="nama" value="{{ $ktp->nama }}">
            @error('nama') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="id" class="form-label">NIK</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="NIK" name="id" value="{{ $ktp->id }}">
            @error ('id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KK" class="form-label">KK</label>
            <input type="number" class="form-control @error('KK') is-invalid @enderror" id="KK" placeholder="KK" name="KK" value="{{ $ktp->KK }}">
            @error ('KK') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
       
        <div class="mb-3">
            <label for="hub_keluarga" class="form-label">Status Hubungan Keluarga</label>
            <select class="form-control @error('hub_keluarga') is-invalid @enderror" aria-label="Default select example" id="hub_keluarga" name="hub_keluarga" value="{{ $ktp->hub_keluarga }}"> 
                <option selected value="{{ $ktp->hub_keluarga }}">{{ $ktp->hub_keluarga}}</option>
                <option value="Kepala Keluarga">Kepala Keluarga</option>
                <option value="Suami">Suami</option>
                <option value="Istri">Istri</option>
                <option value="Anak">Anak</option>
                <option value="Menantu">Menantu</option>
                <option value="Cucu">Cucu</option>
                <option value="Orang Tua">Orang Tua</option>
                <option value="Mertua">Mertua</option>
                <option value="Famili Lain">Famili Lain</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            @error ('hub_keluarga') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ $ktp->tempat_lahir }}">
            @error ('tempat_lahir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ $ktp->tanggal_lahir }}">
            @error ('tanggal_lahir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="alamat_KTP" class="form-label">Alamat KTP</label>
            <input type="text" class="form-control @error('alamat_KTP') is-invalid @enderror" id="alamat_KTP" placeholder="Alamat" name="alamat_KTP" value="{{ $ktp->alamat_KTP }}">
            @error ('alamat_KTP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $ktp->rt_id }}"> 
                <option selected value="{{ $ktp->rt_id }}">{{ $ktp->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $ktp->rw_id }}"> 
                <option selected value="{{ $ktp->rw_id }}">{{ $ktp->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>


        <div class="mb-3">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" placeholder="Kelurahan" name="kelurahan" value="{{ $ktp->kelurahan }}">
            @error ('kelurahan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" placeholder="Kecamatan" name="kecamatan" value="{{ $ktp->kecamatan }}">
            @error ('kecamatan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="kota_kab" class="form-label">Kota / Kabupaten</label>
            <input type="text" class="form-control @error('kota_kab') is-invalid @enderror" id="kota_kab" placeholder="Kota / Kabupaten" name="kota_kab" value="{{ $ktp->kota_kab }}">
            @error ('kota_kab') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="propinsi" class="form-label">Propinsi</label>
            <input type="text" class="form-control @error('propinsi') is-invalid @enderror" id="propinsi" placeholder="Propinsi" name="propinsi" value="{{ $ktp->propinsi }}">
            @error ('propinsi') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="agama_id" class="form-label">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" aria-label="Default select example" id="agama_id" name="agama_id"> 
                <option selected value="{{ $ktp->agama_id }}">{{ $ktp->agama->agama}}</option>
                @foreach ($agama as $ag)
                <option value="{{$ag->id}}">{{$ag->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="form-label">Status Kawin</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" aria-label="Default select example" id="statuskawin_id" name="statuskawin_id"> 
                <option selected value="{{ $ktp->statuskawin_id }}">{{ $ktp->statuskawin->statuskawin}}</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}">{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div> 

        <div class="mb-3">
            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" aria-label="Default select example" id="jeniskelamin_id" name="jeniskelamin_id"> 
                <option selected value="{{ $ktp->jeniskelamin_id }}">{{ $ktp->jeniskelamin->jeniskelamin}}</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}">{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" value="{{ $ktp->pekerjaan }}">
            @error('pekerjaan') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/ktp" role="button">Close</a>
        </div>
</form>
        </div>
    </div>


@endsection