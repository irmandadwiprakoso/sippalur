@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data TKK <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/tkk" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama " name="nama" value="{{ old('nama') }}">
            @error('nama') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="nik" placeholder="NIK " name="NIK" value="{{ old('NIK') }}">
            @error ('NIK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KK" class="form-label">KK</label>
            <input type="number" class="form-control @error('KK') is-invalid @enderror" id="KK" placeholder="KK " name="KK" value="{{ old('KK') }}">
            @error ('KK') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>
       
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir " name="tempat_lahir" value="{{ old('tempat_lahir') }}">
            @error ('tempat_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir " name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            @error ('tanggal_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
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
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat " name="alamat" value="{{ old('alamat') }}">
            @error ('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror 
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
            <label for="pendidikanpeg_id" class="form-label">Pendidikan</label>
            <select class="form-control @error('pendidikanpeg_id') is-invalid @enderror" id="pendidikanpeg_id" name="pendidikanpeg_id" value="{{ old('pendidikanpeg_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($pendidikanpeg as $pendidikan)
                <option value="{{$pendidikan->id}}" {{old('pendidikanpeg_id') == $pendidikan->id ? 'selected' : null }}>{{$pendidikan->pendidikanpeg}}</option>
                @endforeach
            </select>
            @error ('pendidikanpeg_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
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
            <label for="seksi_id" class="form-label">Seksi</label>
            <select class="form-control @error('seksi_id') is-invalid @enderror" id="seksi_id" name="seksi_id" value="{{ old('seksi_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($seksi as $seksianda)
                <option value="{{$seksianda->id}}" {{old('seksi_id') == $seksianda->id ? 'selected' : null }}>{{$seksianda->seksi}}</option>
                @endforeach
            </select>
            @error ('seksi_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
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
            <label for="SK_Tkk" class="form-label">SK Pengangakatan TKK</label>
            <input type="date" class="form-control @error('SK_Tkk') is-invalid @enderror" id="SK_Tkk" placeholder="SK TKK" name="SK_Tkk" value="{{ old('SK_Tkk') }}">
            @error ('SK_Tkk') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Nomor Rekening BJB " name="no_rek" value="{{ old('no_rek') }}">
            @error ('no_rek') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP " name="npwp" value="{{ old('npwp') }}">
            @error ('npwp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email " name="email" value="{{ old('email') }}">
            @error ('email') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_HP" class="form-label">Nomor Handphone</label>
            <input type="number" class="form-control @error('no_HP') is-invalid @enderror" id="no_HP" placeholder="Nomor HP " name="no_HP" value="{{ old('no_HP') }}">
            @error ('no_HP') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
            @error ('username') <div class="invalid-feedback">{{ $message }} </div>@enderror       
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

        <div class="input-group mb-3">
            <label for="foto" value="{{ old('foto') }}">Foto Profile</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
            @error ('foto') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/tkk" role="button">Close</a>
        </div>
</form>
        </div>
    </div>

@endsection