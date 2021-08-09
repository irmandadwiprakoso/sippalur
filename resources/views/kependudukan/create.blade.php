@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Input Jumlah Data Kependudukan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
    <div class="box box-primary">

<form action="/kependudukan" method="post">
    @csrf 
    <div class="box-body">
        <div class="mb-3">
            <label for="rt_id" class="form-label">RT</label>
            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id" value="{{ old('rt_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rt as $erte)
                <option value="{{$erte->id}}" {{old('rt_id') == $erte->id ? 'selected' : null }}>{{$erte->rt}}</option>
                @endforeach
            </select>
            @error ('rt_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="rw_id" class="form-label">RW</label>
            <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id" value="{{ old('rw_id') }}"> 
                <option selected disabled>- Pilih -</option>
                @foreach ($rw as $erwe)
                <option value="{{$erwe->id}}" {{old('rw_id') == $erwe->id ? 'selected' : null }}>{{$erwe->rw}}</option>
                @endforeach
            </select>
            @error ('rw_id') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="KK" class="form-label">Jumlah KK </label>
            <input type="number" class="form-control @error('KK') is-invalid @enderror" placeholder="Jumlah KK" id="KK" name="KK" value="{{ old('KK') }}">
            @error ('KK') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>
    
        <div class="mb-3">
            <label for="Laki_laki" class="form-label">Jumlah Laki-laki </label>
            <input type="number" class="form-control @error('Laki_laki') is-invalid @enderror" placeholder="Jumlah Jiwa" id="Laki_laki" name="Laki_laki" value="{{ old('Laki_laki') }}">
            @error ('Laki_laki') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>

        <div class="mb-3">
            <label for="Perempuan" class="form-label">Jumlah Perempuan </label>
            <input type="number" class="form-control @error('Perempuan') is-invalid @enderror" placeholder="Jumlah Jiwa" id="Perempuan" name="Perempuan" value="{{ old('Perempuan') }}">
            @error ('Perempuan') <div class="alert alert-danger">{{ $message }} </div>@enderror 
        </div>


        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Data</button>
            <a class="btn btn-default" href="/kependudukan" role="button">Cancel</a>
        </div>
    </form>
</div>
</div>


@endsection