@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data PNS <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/pns/{{ $pns->id }}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama " name="nama" value="{{ $pns->nama }}">
            @error('nama') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">id</label>
            <input type="number" class="form-control @error('id') is-invalid @enderror" id="nip" placeholder="id " name="id" value="{{ $pns->id }}">
            @error ('id') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="number" class="form-control @error('NIK') is-invalid @enderror" id="nik" placeholder="NIK " name="NIK" value="{{ $pns->NIK }}">
            @error ('NIK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pangkat_id" class="form-label">Pangkat</label>
            <select class="form-control @error('pangkat_id') is-invalid @enderror" aria-label="Default select example" id="pangkat_id" name="pangkat_id"> 
                <option selected value="{{ $pns->pangkat_id }}">{{ $pns->pangkat->pangkat}}</option>
                @foreach ($pangkat as $pangkatpns)
                <option value="{{$pangkatpns->id}}">{{$pangkatpns->pangkat}}</option>
                @endforeach
            </select>
            @error ('pangkat_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="golongan_id" class="form-label">Golongan</label>
            <select class="form-control @error('golongan_id') is-invalid @enderror" aria-label="Default select example" id="golongan_id" name="golongan_id"> 
                <option selected value="{{ $pns->golongan_id }}">{{ $pns->golongan->golongan}}</option>
                @foreach ($golongan as $golonganpns)
                <option value="{{$golonganpns->id}}">{{$golonganpns->golongan}}</option>
                @endforeach
            </select>
            @error ('golongan_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan</label>
            <select class="form-control @error('jabatan_id') is-invalid @enderror" aria-label="Default select example" id="jabatan_id" name="jabatan_id"> 
                <option selected value="{{ $pns->jabatan_id }}">{{ $pns->jabatan->jabatan}}</option>
                @foreach ($jabatan as $jab)
                <option value="{{$jab->id}}">{{$jab->jabatan}}</option>
                @endforeach
            </select>
            @error ('jabatan_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir " name="tempat_lahir" value="{{ $pns->tempat_lahir }}">
            @error ('tempat_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir " name="tanggal_lahir" value="{{ $pns->tanggal_lahir }}">
            @error ('tanggal_lahir') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="jeniskelamin_id" class="form-label">Jenis Kelamin</label>
            <select class="form-control @error('jeniskelamin_id') is-invalid @enderror" aria-label="Default select example" id="jeniskelamin_id" name="jeniskelamin_id"> 
                <option selected value="{{ $pns->jeniskelamin_id }}">{{ $pns->jeniskelamin->jeniskelamin}}</option>
                @foreach ($jeniskelamin as $jk)
                <option value="{{$jk->id}}">{{$jk->jeniskelamin}}</option>
                @endforeach
            </select>
            @error ('jeniskelamin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <!-- <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat" value="{{ $pns->alamat }}">{{ $pns->alamat }}</textarea>
            @error ('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div> -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat" value="{{ $pns->alamat }}">
            @error ('alamat') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="agama_id" class="form-label">Agama</label>
            <select class="form-control @error('agama_id') is-invalid @enderror" aria-label="Default select example" id="agama_id" name="agama_id"> 
                <option selected value="{{ $pns->agama_id }}">{{ $pns->agama->agama}}</option>
                @foreach ($agama as $ag)
                <option value="{{$ag->id}}">{{$ag->agama}}</option>
                @endforeach
            </select>
            @error ('agama_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="pendidikanpeg_id" class="form-label">Pendidikan</label>
            <select class="form-control @error('pendidikanpeg_id') is-invalid @enderror" aria-label="Default select example" id="pendidikanpeg_id" name="pendidikanpeg_id"> 
                <option selected value="{{ $pns->pendidikanpeg_id }}">{{ $pns->pendidikanpeg->pendidikanpeg}}</option>
                @foreach ($pendidikanpeg as $pend)
                <option value="{{$pend->id}}">{{$pend->pendidikanpeg}}</option>
                @endforeach
            </select>
            @error ('pendidikanpeg_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="statuskawin_id" class="form-label">Status Kawin</label>
            <select class="form-control @error('statuskawin_id') is-invalid @enderror" aria-label="Default select example" id="statuskawin_id" name="statuskawin_id"> 
                <option selected value="{{ $pns->statuskawin_id }}">{{ $pns->statuskawin->statuskawin}}</option>
                @foreach ($statuskawin as $kawin)
                <option value="{{$kawin->id}}">{{$kawin->statuskawin}}</option>
                @endforeach
            </select>
            @error ('statuskawin_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="SK_Jabatan" class="form-label">SK Jabatan</label>
            <input type="date" class="form-control @error('SK_Jabatan') is-invalid @enderror" id="SK_Jabatan" placeholder="SK Jabatan " name="SK_Jabatan" value="{{ $pns->SK_Jabatan }}">
            @error ('SK_Jabatan') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_rek" class="form-label">Nomor Rekening BJB</label>
            <input type="number" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" placeholder="Nomor Rekening BJB " name="no_rek" value="{{ $pns->no_rek }}">
            @error ('no_rek') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="npwp" class="form-label">NPWP</label>
            <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="npwp" placeholder="NPWP " name="npwp" value="{{ $pns->npwp }}">
            @error ('npwp') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email " name="email" value="{{ $pns->email }}">
            @error ('email') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="mb-3">
            <label for="no_HP" class="form-label">Nomor Handphone</label>
            <input type="number" class="form-control @error('no_HP') is-invalid @enderror" id="no_HP" placeholder="Nomor HP " name="no_HP" value="{{ $pns->no_HP }}">
            @error ('no_HP') <div class="invalid-feedback">{{ $message }} </div>@enderror       
        </div>

        <div class="input-group mb-3">
            <label for="foto" >Foto Profile</label>
                <input type="file"class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                @error ('foto') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="input-group mb-3">
                <img src="{{asset('images/ASN/'.$pns->foto)}}" height="20%" width="20%"></img>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/pns" role="button">Cancel</a>
        </div>

        </form>
    </div>
</div>

@endsection