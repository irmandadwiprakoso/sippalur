@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data TKK <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Pegawai TKK</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/tkk/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exporttkk" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "sekret")
                    <a href="/tkk/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exporttkk" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")
                    <a href="/tkk/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exporttkk" class="btn btn-success">Export Data</a>
                    @endif
                <hr>
        <div class="row">
        <div class="col-lg-5 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Jumlah TKK</p>
              <h3>{{$tkk->count()}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-5 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Jumlah Pamor</p>
              <h3> {{ $tkk->where('jabatan_id', '=', '11')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

      </div>
      </div>

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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>RW</th>
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
                        @foreach ($tkk as $nonasn)
                            <tr>
                                <td class=" ">{{ $loop->iteration}}</td>
                                <td class=" ">{{ $nonasn-> id}}</td>
                                <td class=" ">{{ $nonasn-> nama}}</td>
                                <td class=" ">{{ $nonasn-> jabatan -> jabatan}}</td>
                                <td class=" ">{{ $nonasn-> rw -> rw}}</td>
                                
                                <td class=" ">
                                    <a href="/tkk/{{ $nonasn->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                        <i class="glyphicon glyphicon-search"></i>
                                    </a>
                                </td>
                            
                                @if (auth()->user()->role == "superadmin")
                                <td class=" ">
                                    <a href="/tkk/{{ $nonasn->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                @elseif (auth()->user()->role == "sekret")
                                <td class=" ">
                                    <a href="/tkk/{{ $nonasn->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </td>
                                @endif

                                @if (auth()->user()->role == "superadmin")                            
                                <td class=" ">
                                <a href="#" data-id="{{ $nonasn->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                        <form action="{{ url('tkk', $nonasn->id) }}" id="delete{{ $nonasn->id }}" method="post" >
                                        @method('delete')
                                        @csrf
                                        </form>
                                    </a>
                                </td>
                                @elseif (auth()->user()->role == "sekret")                            
                                <td class=" ">
                                <a href="#" data-id="{{ $nonasn->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                        <form action="{{ url('tkk', $nonasn->id) }}" id="delete{{ $nonasn->id }}" method="post" >
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