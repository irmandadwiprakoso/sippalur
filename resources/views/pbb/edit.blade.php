@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Edit Data SPPT PBB <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/pbb/{{ $pbb->id}}" method="post" enctype="multipart/form-data">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="NOP" class="text-danger">NOP*</label>
            <input type="text" class="form-control @error('NOP') is-invalid @enderror" id="NOP" name="NOP" placeholder="32.75.060......" value="{{ $pbb->NOP }}" disabled>
            @error ('NOP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="NM_WP_SPPT" class="text-danger">NAMA WP*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('NM_WP_SPPT') is-invalid @enderror" id="NM_WP_SPPT" placeholder="NAMA WAJIB PAJAK" name="NM_WP_SPPT" value="{{ $pbb->NM_WP_SPPT }}" disabled>
            @error ('NM_WP_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="TOTAL_LUAS_BUMI" class="text-danger">TOTAL LUAS BUMI*</label>
            <input type="number" class="form-control @error('TOTAL_LUAS_BUMI') is-invalid @enderror" id="TOTAL_LUAS_BUMI" placeholder="TOTAL LUAS BUMI" name="TOTAL_LUAS_BUMI" value="{{ $pbb->TOTAL_LUAS_BUMI }}" disabled>
            @error ('TOTAL_LUAS_BUMI') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="NJOP_BUMI_SPPT" class="text-danger">NJOP BUMI SPPT*</label>
            <input type="number" class="form-control @error('NJOP_BUMI_SPPT') is-invalid @enderror" id="NJOP_BUMI_SPPT" placeholder="NJOP LUAS BUMI" name="NJOP_BUMI_SPPT" value="{{ $pbb->NJOP_BUMI_SPPT }}" disabled>
            @error ('NJOP_BUMI_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="TOTAL_LUAS_BNG" class="text-danger">TOTAL LUAS BNG*</label>
            <input type="number" class="form-control @error('TOTAL_LUAS_BNG') is-invalid @enderror" id="TOTAL_LUAS_BNG" placeholder="TOTAL LUAS BANGUNAN" name="TOTAL_LUAS_BNG" value="{{ $pbb->NJOP_BUMI_SPPT }}" disabled>
            @error ('TOTAL_LUAS_BNG') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="NJOP_BNG_SPPT" class="text-danger">NJOP BNG SPPT*</label>
            <input type="number" class="form-control @error('NJOP_BNG_SPPT') is-invalid @enderror" id="NJOP_BNG_SPPT" placeholder="NJOP LUAS BANGUNAN" name="NJOP_BNG_SPPT" value="{{ $pbb->NJOP_BNG_SPPT }}" disabled>
            @error ('NJOP_BNG_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="ALM_OP" class="text-danger">ALAMAT OP*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('ALM_OP') is-invalid @enderror" id="ALM_OP" placeholder="ALAMAT OBJEK PAJAK" name="ALM_OP" value="{{ $pbb->ALM_OP}}">
            @error ('ALM_OP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rt_id" class="text-danger">RT*</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $pbb->rt_id }}"> 
                <option selected value="{{ $pbb->rt_id }}">{{ $pbb->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="text-danger">RW*</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $pbb->rw_id }}"> 
                <option selected value="{{ $pbb->rw_id }}">{{ $pbb->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
        
        <div class="mb-3">
            <label for="ALM_WP" class="text-danger">ALAMAT WAJIB PAJAK*</label>
            <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control @error('ALM_WP') is-invalid @enderror" id="ALM_WP" placeholder="ALAMAT WAJIB PAJAK" name="ALM_WP" value="{{ $pbb->ALM_WP }}" disabled>
            @error ('ALM_WP') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="PBB_TERHUTANG_SPPT" class="text-danger">PBB TERHUTANG*</label>
            <input type="number" class="form-control @error('PBB_TERHUTANG_SPPT') is-invalid @enderror" id="PBB_TERHUTANG_SPPT" placeholder="PBB TERHUTANG" name="PBB_TERHUTANG_SPPT" value="{{ $pbb->PBB_TERHUTANG_SPPT }}" disabled>
            @error ('PBB_TERHUTANG_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="TAHUN_SPPT" class="text-danger">TAHUN SPPT*</label>
            <input type="number" class="form-control @error('TAHUN_SPPT') is-invalid @enderror" id="TAHUN_SPPT" placeholder="TAHUN SPPT" name="TAHUN_SPPT" value="{{ $pbb->TAHUN_SPPT }}" disabled>
            @error ('TAHUN_SPPT') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KETERANGAN" class="text-danger">KETERANGAN*</label>
            <select class="form-control @error('KETERANGAN') is-invalid @enderror" id="KETERANGAN" placeholder="KETERANGAN" name="KETERANGAN" > 
            <option selected value="{{ $pbb->KETERANGAN }}">{{ $pbb->KETERANGAN}}</option>
                <option value="TERHUTANG">TERHUTANG</option>
                <option value="LUNAS">LUNAS</option>
                <option value="WP DOUBLE">WP DOUBLE</option>
                <option value="OP TIDAK DIKETAHUI">OP TIDAK DIKETAHUI</option>
                <option value="OP TIDAK ADA FISIK">TIDAK ADA FISIK</option>
                <option value="5 TAHUN">5 TAHUN TIDAK PEMBAYARAN</option>
            </select>
            @error ('KETERANGAN') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/pbb" role="button">Cancel</a>
        </div>
</form>
        </div>
    </div>


@endsection