@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data PNS <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Pegawai PNS</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/pns/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportasn" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "sekret")
                    <a href="/pns/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportasn" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")
                    <a href="/pns/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportasn" class="btn btn-success">Export Data</a>
                    @endif
                <hr>
                <div class="table-responsive">
                    <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="tabel_length"> 
                                    </div>
                                </div>
                            </div>
                        <!-- <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div> -->
                    </div>
                    <table id="Datatables" class="table table-bordered table-striped">
                        <thead>
                            <tr>                         
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Pangkat</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>View</th>
                                @if (auth()->user()->role == "superadmin")
                                <th>Edit</th>
                                <th>Delete</th>
                                @elseif (auth()->user()->role == "sekret")
                                <th>Edit</th>
                                <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                            <tbody>	
                                @foreach ($pns as $pegawainegerisipil)
                                    <tr>
                                        <td class=" ">{{ $loop->iteration}}</td>
                                        <td class=" ">{{ $pegawainegerisipil->id}}</td>
                                        <td class=" ">{{ $pegawainegerisipil->nama}}</td>
                                        <td class=" ">{{ $pegawainegerisipil->pangkat->pangkat}}</td>
                                        <td class=" ">{{ $pegawainegerisipil->golongan->golongan}}</td>
                                        <td class=" ">{{ $pegawainegerisipil->jabatan->jabatan}}</td>
                                        <td class=" ">{{ $pegawainegerisipil->agama->agama}}</td>
                                        
                                        <td class=" ">
                                            <a href="/pns/{{$pegawainegerisipil->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                                <i class="glyphicon glyphicon-search"></i>
                                            </a>
                                        </td>
                                        
                                        @if (auth()->user()->role == "superadmin")
                                        <td class=" ">
                                            <a href="/pns/{{ $pegawainegerisipil->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                        </td>
                                        @elseif (auth()->user()->role == "sekret")
                                        <td class=" ">
                                            <a href="/pns/{{ $pegawainegerisipil->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </a>
                                        </td>
                                        @endif

                                        @if (auth()->user()->role == "superadmin")
                                        <td class=" ">
                                            <a href="#" data-id="{{ $pegawainegerisipil->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                                <form action="{{ url('pns', $pegawainegerisipil->id) }}" id="delete{{ $pegawainegerisipil->id }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </a>
                                        </td>
                                        @elseif (auth()->user()->role == "sekret")
                                        <td class=" ">
                                            <a href="#" data-id="{{ $pegawainegerisipil->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                                <form action="{{ url('pns', $pegawainegerisipil->id) }}" id="delete{{ $pegawainegerisipil->id }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>	
@endsection