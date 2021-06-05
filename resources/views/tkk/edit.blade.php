@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data TKK <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/tkk/{{ $tkk->id}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Anda" name="nama" value="{{ $tkk->nama }}">
            @error('nama') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="nik" placeholder="NIK Anda" name="NIK" value="{{ $tkk->NIK }}">
            @error ('NIK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KK" class="form-label">KK</label>
            <input type="number" class="form-control @error('KK') is-invalid @enderror" id="KK" placeholder="KK Anda" name="KK" value="{{ $tkk->KK }}">
            @error ('KK') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>
       
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir Anda" name="tempat_lahir" value="{{ $tkk->tempat_lahir }}">
            @error ('tempat_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir Anda" name="tanggal_lahir" value="{{ $tkk->tanggal_lahir }}">
            @error ('tanggal_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" aria-label="Default select example" id="jeniskelamin_id" name="jeniskelamin_id"> 
                <option selected value="{{ $tkk->jeniskelamin_id }}">{{ $tkk->jeniskelamin->jeniskelamin}}</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}">{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat Anda" name="alamat" value="{{ $tkk->alamat }}">
            @error ('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="agama_id" class="form-label">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" aria-label="Default select example" id="agama_id" name="agama_id"> 
                <option selected value="{{ $tkk->agama_id }}">{{ $tkk->agama->agama}}</option>
                @foreach ($agama as $ag)
                <option value="{{$ag->id}}">{{$ag->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pendidikanpeg_id" class="form-label">Pendidikan</label>
            <select class="form-control @error('pendidikanpeg_id') is-invalid @enderror" aria-label="Default select example" id="pendidikanpeg_id" name="pendidikanpeg_id"> 
                <option selected value="{{ $tkk->pendidikanpeg_id }}">{{ $tkk->pendidikanpeg->pendidikanpeg}}</option>
                @foreach ($pendidikanpeg as $pend)
                <option value="{{$pend->id}}">{{$pend->pendidikanpeg}}</option>
                @endforeach
            </select>
            @error ('pendidikanpeg_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="form-label">Status Kawin</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" aria-label="Default select example" id="statuskawin_id" name="statuskawin_id"> 
                <option selected value="{{ $tkk->statuskawin_id }}">{{ $tkk->statuskawin->statuskawin}}</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}">{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="seksi_id" class="form-label">Seksi</label>
            <select class="form-control @error('seksi_id') is-invalid @enderror" aria-label="Default select example" id="seksi_id" name="seksi_id" value="{{ $tkk->seksi_id }}"> 
                <option selected value="{{ $tkk->seksi_id }}">{{ $tkk->seksi->seksi}}</option>
                @foreach ($seksi as $seksianda)
                <option value="{{$seksianda->id}}">{{$seksianda->seksi}}</option>
                @endforeach
            </select>
            @error ('seksi_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select class="form-control @error('jabatan_id') is-invalid @enderror" aria-label="Default select example" id="jabatan_id" name="jabatan_id"> 
                <option selected value="{{ $tkk->jabatan_id }}">{{ $tkk->jabatan->jabatan}}</option>
                @foreach ($jabatan as $jab)
                <option value="{{$jab->id}}">{{$jab->jabatan}}</option>
                @endforeach
            </select>
            @error ('jabatan_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="SK_Tkk" class="form-label">SK Pengangakatan TKK</label>
            <input type="date" class="form-control @error('SK_Tkk') is-invalid @enderror" id="SK_Tkk" placeholder="SK TKK" name="SK_Tkk" value="{{ $tkk->SK_Tkk }}">
            @error ('SK_Tkk') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Nomor Rekening BJB Anda" name="no_rek" value="{{ $tkk->no_rek }}">
            @error ('no_rek') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP Anda" name="npwp" value="{{ $tkk->npwp }}">
            @error ('npwp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Anda" name="email" value="{{ $tkk->email }}">
            @error ('email') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_HP" class="form-label">Nomor Handphone</label>
            <input type="number" class="form-control @error('no_HP') is-invalid @enderror" id="no_HP" placeholder="Nomor HP Anda" name="no_HP" value="{{ $tkk->no_HP }}">
            @error ('no_HP') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>
        
        <div class="input-group mb-3">
        <label for="foto">Foto Profile</label>
            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ $tkk->foto }}">
            @error ('foto') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
                <img src="{{asset('images/'.$tkk->foto)}}" height="20%" width="20%"></img>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/tkk" role="button">Close</a>
        </div>
</form>
        </div>
    </div>


@endsection