@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Warga <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/warga/{{ $warga->id}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Anda" name="nama" value="{{ $warga->nama }}">
            @error('nama') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="NIK" class="form-label">NIK</label>
            <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="NIK" placeholder="NIK Anda" name="NIK" value="{{ $warga->NIK }}">
            @error ('NIK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
       
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir Anda" name="tempat_lahir" value="{{ $warga->tempat_lahir }}">
            @error ('tempat_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir Anda" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}">
            @error ('tanggal_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="alamat_KTP" class="form-label">Alamat KTP</label>
            <input type="text" class="form-control @error('alamat_KTP') is-invalid @enderror" id="alamat_KTP" placeholder="Alamat Anda" name="alamat_KTP" value="{{ $warga->alamat_KTP }}">
            @error ('alamat_KTP') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
            <input type="text" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" placeholder="Alamat Anda" name="alamat_domisili" value="{{ $warga->alamat_domisili }}">
            @error ('alamat_domisili') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $warga->rt_id }}"> 
                <option selected value="{{ $warga->rt_id }}">{{ $warga->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $warga->rw_id }}"> 
                <option selected value="{{ $warga->rw_id }}">{{ $warga->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="agama_id" class="form-label">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" aria-label="Default select example" id="agama_id" name="agama_id"> 
                <option selected value="{{ $warga->agama_id }}">{{ $warga->agama->agama}}</option>
                @foreach ($agama as $ag)
                <option value="{{$ag->id}}">{{$ag->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="form-label">Status Kawin</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" aria-label="Default select example" id="statuskawin_id" name="statuskawin_id"> 
                <option selected value="{{ $warga->statuskawin_id }}">{{ $warga->statuskawin->statuskawin}}</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}">{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div> 

        <div class="mb-3">
            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" aria-label="Default select example" id="jeniskelamin_id" name="jeniskelamin_id"> 
                <option selected value="{{ $warga->jeniskelamin_id }}">{{ $warga->jeniskelamin->jeniskelamin}}</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}">{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Nama Anda" name="pekerjaan" value="{{ $warga->pekerjaan }}">
            @error('pekerjaan') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/tkk" role="button">Close</a>
        </div>
</form>
        </div>
    </div>


@endsection