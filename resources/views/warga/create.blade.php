@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data Warga <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/warga" method="post">
    @csrf 
    <div class="box-body">
    
    <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="nik" placeholder="NIK Anda" name="NIK" value="{{ old('NIK') }}">
            @error ('NIK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Anda" name="nama" value="{{ old('nama') }}">
            @error('nama') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir Anda" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
            @error ('tempat_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir Anda" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error ('tanggal_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>


        <div class="mb-3">
            <label for="alamat_KTP" class="form-label">Alamat KTP</label>
            <input type="text" class="form-control @error('alamat_KTP') is-invalid @enderror" id="alamat_KTP" placeholder="Alamat Anda" name="alamat_KTP" value="{{ old('alamat_KTP') }}">
            @error ('alamat_KTP') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id"> 
                <option selected disabled> - Pilih - </option>
                @foreach ($rt as $erte)
                  <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id"> 
                <option selected disabled> - Pilih - </option>
                @foreach ($rw as $erwe)
                  <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" placeholder="Alamat Anda" name="kelurahan" value="{{ old('kelurahan') }}">
            @error ('kelurahan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" placeholder="Alamat Anda" name="kecamatan" value="{{ old('kecamatan') }}">
            @error ('kecamatan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kota_kab" class="form-label">Kota / Kabupaten </label>
            <input type="text" class="form-control @error('kota_kab') is-invalid @enderror" id="kota_kab" placeholder="Alamat Anda" name="kota_kab" value="{{ old('kota_kab') }}">
            @error ('kota_kab') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="propinsi" class="form-label">Propinsi</label>
            <input type="text" class="form-control @error('propinsi') is-invalid @enderror" id="propinsi" placeholder="Alamat Anda" name="propinsi" value="{{ old('propinsi') }}">
            @error ('propinsi') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>



        <div class="mb-3">
            <label for="agama_id" class="form-label">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" id="agama_id" name="agama_id" value="{{ old('agama_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($agama as $agamadia)
                <option value="{{$agamadia->id}}" {{old('agama_id') == $agamadia->id ? 'selected' : null }}>{{$agamadia->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="form-label">Status Perkawinan</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" id="statuskawin_id" name="statuskawin_id" value="{{ old('statuskawin_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}" {{old('statuskawin_id') == $kawin->id ? 'selected' : null }}>{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" id="jeniskelamin_id" name="jeniskelamin_id" value="{{ old('jeniskelamin_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}" {{old('jeniskelamin_id') == $jk->id ? 'selected' : null }}>{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan Anda" name="pekerjaan" value="{{ old('pekerjaan') }}">
            @error ('pekerjaan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/warga" role="button">Cancel</a>
        </div>
</form>
        </div>
    </div>

@endsection