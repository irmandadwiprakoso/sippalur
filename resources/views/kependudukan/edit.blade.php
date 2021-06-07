@extends('layout.master')

@section('title')

<<section class="content-header">
      <h1>Edit Data Sarana Ibadah <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/kependudukan/{{ $kependudukan->id }}" method="post">
    @method('patch')
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" aria-label="Default select example" id="rt_id" name="rt_id" value="{{ $kependudukan->rt_id }}"> 
                <option selected value="{{ $kependudukan->rt_id }}">{{ $kependudukan->rt->rt}}</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}">{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" aria-label="Default select example" id="rw_id" name="rw_id" value="{{ $kependudukan->rw_id }}"> 
                <option selected value="{{ $kependudukan->rw_id }}">{{ $kependudukan->rw->rw}}</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}">{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KK" class="form-label">Jumlah KK</label>
            <input type="number" class="form-control @error('KK') is-invalid @enderror" id="KK" name="KK" value="{{ $kependudukan->KK }}">
            @error ('KK') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="Laki_laki" class="form-label">Jumlah Laki-laki</label>
            <input type="number" class="form-control @error('Laki_laki') is-invalid @enderror" id="Laki_laki" name="Laki_laki" value="{{ $kependudukan->Laki_laki }}">
            @error ('Laki_laki') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="Perempuan" class="form-label">Jumlah Perempuan</label>
            <input type="number" class="form-control @error('Perempuan') is-invalid @enderror" id="Perempuan" name="Perempuan" value="{{ $kependudukan->Perempuan }}">
            @error ('Perempuan') <div class="invalid-feedback">{{ $message }} </div>@enderror 
        </div>
        
        <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Data</button>
            <a class="btn btn-default" href="/kependudukan" role="button">Cancel</a>
        </div>

</form>
    </div>
</div>

@endsection