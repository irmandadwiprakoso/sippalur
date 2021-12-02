@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data PNS <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/asn" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="id" class="form-label">NIP</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="id" placeholder="NIP " name="id" value="{{ old('id') }}">
            @error ('id') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama " name="nama" value="{{ old('nama') }}">
            @error('nama') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="NIK" class="form-label">NIK</label>
            <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="NIK" placeholder="NIK " name="NIK" value="{{ old('NIK') }}">
            @error ('NIK') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pangkat_id" class="form-label">Pangkat</label>
            <select class="form-control @error('pangkat_id') is-invalid @enderror" id="pangkat_id" name="pangkat_id" value="{{ old('pangkat_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($pangkat as $pangkatpns)
                <option value="{{$pangkatpns->id}}" {{old('pangkat_id') == $pangkatpns->id ? 'selected' : null }}>{{$pangkatpns->pangkat}}</option>
                @endforeach
            </select>
            @error ('pangkat_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="golongan_id" class="form-label">Golongan</label>
            <select class="form-control @error('golongan_id') is-invalid @enderror" id="golongan_id" name="golongan_id" value="{{ old('golongan_id') }}"> 
                <option selected disabled>- Pilih - </option>
                @foreach ($golongan as $golonganpns)
                <option value="{{$golonganpns->id}}" {{old('golongan_id') == $golonganpns->id ? 'selected' : null }}>{{$golonganpns->golongan}}</option>
                @endforeach
            </select>
            @error ('golongan_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
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
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir " name="tempat_lahir" value="{{ old('tempat_lahir') }}">
            @error ('tempat_lahir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir " name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error ('tanggal_lahir') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" id="jeniskelamin_id" name="jeniskelamin_id" value="{{ old('jeniskelamin_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}" {{old('jeniskelamin_id') == $jk->id ? 'selected' : null }}>{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat " value="{{ old('alamat') }}">
            @error ('alamat') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="agama_id" class="form-label">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" id="agama_id" name="agama_id" value="{{ old('agama_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($agama as $ag)
                <option value="{{$ag->id}}" {{old('agama_id') == $ag->id ? 'selected' : null }}>{{$ag->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pendidikanpeg_id" class="form-label">Pendidikan</label>
            <select class="form-control @error('pendidikanpeg_id') is-invalid @enderror" id="pendidikanpeg_id" name="pendidikanpeg_id" value="{{ old('pendidikanpeg_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($pendidikanpeg as $pend)
                <option value="{{$pend->id}}" {{old('pendidikanpeg_id') == $pend->id ? 'selected' : null }}>{{$pend->pendidikanpeg}}</option>
                @endforeach
            </select>
            @error ('pendidikanpeg_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="form-label">Status Kawin</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" id="statuskawin_id" name="statuskawin_id" value="{{ old('statuskawin_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}" {{old('statuskawin_id') == $kawin->id ? 'selected' : null }}>{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="SK_Jabatan" class="form-label">SK Jabatan</label>
            <input type="date" class="form-control @error('SK_Jabatan') is-invalid @enderror" id="SK_Jabatan" placeholder="SK TKK" name="SK_Jabatan" value="{{ old('SK_Jabatan') }}">
            @error ('SK_Jabatan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Nomor Rekening BJB " name="no_rek" value="{{ old('no_rek') }}">
            @error ('no_rek') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP " name="npwp" value="{{ old('npwp') }}">
            @error ('npwp') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email " name="email" value="{{ old('email') }}">
            @error ('email') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_HP" class="form-label">Nomor Handphone</label>
            <input type="number" class="form-control @error('no_HP') is-invalid @enderror" id="no_HP" placeholder="Nomor HP " name="no_HP" value="{{ old('no_HP') }}">
            @error ('no_HP') <div class="alert alert-danger">{{ $message }} </div>@enderror       
        </div>

        <div class="input-group mb-3">
        <label for="foto">Foto Profile</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" 
            id="foto" name="foto" value="{{ old('foto') }}">
            @error ('foto') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a class="btn btn-default" href="/asn" role="button">Cancel</a>
        </div>
            </form>
        </div>
    </div>
@endsection