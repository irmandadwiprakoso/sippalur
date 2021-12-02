@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data KTP <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/ktp" method="post">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="id" class="text-danger">NIK</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="NIK " name="id" value="{{ old('id') }}">
            @error ('id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KK" class="text-danger">KK</label>
            <input type="number" class="form-control @error('KK') is-invalid @enderror" id="KK" placeholder="KK " name="KK" value="{{ old('KK') }}">
            @error ('KK') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="nama" class="text-danger">Nama</label>
                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
            @error('nama') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="hub_keluarga" class="text-danger">Status Hubungan Keluarga</label>
            <select class="form-control @error('hub_keluarga') is-invalid @enderror" id="hub_keluarga" name="hub_keluarga" > 
                <option selected>{{ old('hub_keluarga') }}</option>
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
            <label for="tempat_lahir" class="text-danger">Tempat Lahir</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
            @error ('tempat_lahir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="text-danger">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error ('tanggal_lahir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>


        <div class="mb-3">
            <label for="alamat_KTP" class="text-danger">Alamat KTP</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('alamat_KTP') is-invalid @enderror" id="alamat_KTP" placeholder="Alamat" name="alamat_KTP" value="{{ old('alamat_KTP') }}">
            @error ('alamat_KTP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="text-danger">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id"> 
                <option selected disabled> - Pilih - </option>
                @foreach ($rt as $erte)
                  <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="text-danger">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id"> 
                <option selected disabled> - Pilih - </option>
                @foreach ($rw as $erwe)
                  <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kelurahan" class="text-danger">Kelurahan</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" placeholder="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
            @error ('kelurahan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kecamatan" class="text-danger">Kecamatan</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" placeholder="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
            @error ('kecamatan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="kota_kab" class="text-danger">Kota / Kabupaten </label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('kota_kab') is-invalid @enderror" id="kota_kab" placeholder="kota / kabupaten" name="kota_kab" value="{{ old('kota_kab') }}">
            @error ('kota_kab') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="propinsi" class="text-danger">Propinsi</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('propinsi') is-invalid @enderror" id="propinsi" placeholder="propinsi" name="propinsi" value="{{ old('propinsi') }}">
            @error ('propinsi') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="agama_id" class="text-danger">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" id="agama_id" name="agama_id" value="{{ old('agama_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($agama as $agamadia)
                <option value="{{$agamadia->id}}" {{old('agama_id') == $agamadia->id ? 'selected' : null }}>{{$agamadia->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="text-danger">Status Perkawinan</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" id="statuskawin_id" name="statuskawin_id" value="{{ old('statuskawin_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}" {{old('statuskawin_id') == $kawin->id ? 'selected' : null }}>{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jeniskelamin_id" class="text-danger">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" id="jeniskelamin_id" name="jeniskelamin_id" value="{{ old('jeniskelamin_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}" {{old('jeniskelamin_id') == $jk->id ? 'selected' : null }}>{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pekerjaan" class="text-danger"">Pekerjaan</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
            @error ('pekerjaan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a class="btn btn-default" href="/ktp" role="button">Batal</a>
        </div>
    </form>
  </div>
</div>

@endsection