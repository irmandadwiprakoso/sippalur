@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Data SPPT PBB <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/pbb" method="post" enctype="multipart/form-data">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="NOP" class="text-danger">NOP*</label>
            <input type="text" class="form-control @error('NOP') is-invalid @enderror" id="NOP"  name="NOP" placeholder="32.75.060......" value="{{ old('NOP') }}">
            @error ('NOP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="NM_WP_SPPT" class="text-danger">NAMA WP*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('NM_WP_SPPT') is-invalid @enderror" id="NM_WP_SPPT" placeholder="NAMA WAJIB PAJAK" name="NM_WP_SPPT" value="{{ old('NM_WP_SPPT') }}">
            @error ('NM_WP_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="TOTAL_LUAS_BUMI" class="text-danger">TOTAL LUAS BUMI*</label>
            <input type="number" class="form-control @error('TOTAL_LUAS_BUMI') is-invalid @enderror" id="TOTAL_LUAS_BUMI" placeholder="TOTAL LUAS BUMI" name="TOTAL_LUAS_BUMI" value="{{ old('TOTAL_LUAS_BUMI') }}">
            @error ('TOTAL_LUAS_BUMI') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="NJOP_BUMI_SPPT" class="text-danger">NJOP BUMI SPPT*</label>
            <input type="number" class="form-control @error('NJOP_BUMI_SPPT') is-invalid @enderror" id="NJOP_BUMI_SPPT" placeholder="NJOP LUAS BUMI" name="NJOP_BUMI_SPPT" value="{{ old('NJOP_BUMI_SPPT') }}">
            @error ('NJOP_BUMI_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="TOTAL_LUAS_BNG" class="text-danger">TOTAL LUAS BNG*</label>
            <input type="number" class="form-control @error('TOTAL_LUAS_BNG') is-invalid @enderror" id="TOTAL_LUAS_BNG" placeholder="TOTAL LUAS BANGUNAN" name="TOTAL_LUAS_BNG" value="{{ old('TOTAL_LUAS_BNG') }}">
            @error ('TOTAL_LUAS_BNG') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="NJOP_BNG_SPPT" class="text-danger">NJOP BNG SPPT*</label>
            <input type="number" class="form-control @error('NJOP_BNG_SPPT') is-invalid @enderror" id="NJOP_BNG_SPPT" placeholder="NJOP LUAS BANGUNAN" name="NJOP_BNG_SPPT" value="{{ old('NJOP_BNG_SPPT') }}">
            @error ('NJOP_BNG_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="ALM_OP" class="text-danger">ALAMAT OP*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('ALM_OP') is-invalid @enderror" id="ALM_OP" placeholder="ALAMAT OBJEK PAJAK" name="ALM_OP" value="{{ old('ALM_OP') }}">
            @error ('ALM_OP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="text-danger">RT*</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ old('rt_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="text-danger">RW*</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ old('rw_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="ALM_WP" class="text-danger">ALAMAT WAJIB PAJAK*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('ALM_WP') is-invalid @enderror" id="ALM_WP" placeholder="ALAMAT WAJIB PAJAK" name="ALM_WP" value="{{ old('ALM_WP') }}">
            @error ('ALM_WP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="PBB_TERHUTANG_SPPT" class="text-danger">PBB TERHUTANG*</label>
            <input type="number" class="form-control @error('PBB_TERHUTANG_SPPT') is-invalid @enderror" id="PBB_TERHUTANG_SPPT" placeholder="PBB TERHUTANG" name="PBB_TERHUTANG_SPPT" value="{{ old('PBB_TERHUTANG_SPPT') }}">
            @error ('PBB_TERHUTANG_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="TAHUN_SPPT" class="text-danger">TAHUN SPPT*</label>
            <input type="number" class="form-control @error('TAHUN_SPPT') is-invalid @enderror" id="TAHUN_SPPT" placeholder="TAHUN SPPT" name="TAHUN_SPPT" value="{{ old('TAHUN_SPPT') }}">
            @error ('TAHUN_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KETERANGAN" class="text-danger">KETERANGAN*</label>
            <select class="form-control @error('KETERANGAN') is-invalid @enderror" id="KETERANGAN" placeholder="KETERANGAN" name="KETERANGAN" > 
                <option selected>{{ old('KETERANGAN') }}</option>
                <option value="TERHUTANG">TERHUTANG</option>
                <option value="LUNAS">LUNAS</option>
                <option value="WP DOUBLE">WP DOUBLE</option>
                <option value="TIDAK DIKETAHUI">TIDAK DIKETAHUI</option>
            </select>
            @error ('KETERANGAN') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a class="btn btn-default" href="/pbb" role="button">Batal</a>
        </div>
    </form>
        </div>
    </div>

@endsection