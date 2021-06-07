@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Fasos/Fasum <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Fasos/Fasum</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/fasosfasum/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportfasosfasum" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user") 
                    <a href="/fasosfasum/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "permasbang") 
                    <a href="/fasosfasum/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportfasosfasum" class="btn btn-success">Export Data</a>
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
                        <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
                    </div>
                    <table id="Datatables" class="table table-bordered table-striped">
                    <thead>
                        <tr>                             
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Luas</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($fasosfasum as $psu)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $psu->nama}}</td>
                            <td class=" ">{{ $psu->alamat}}</td>
                            <td class=" ">{{ $psu->rt->rt}}</td>
                            <td class=" ">{{ $psu->rw->rw}}</td>
                            <td class=" ">{{ $psu->luas}}</td>

                            <td class=" ">
                                <a href="/fasosfasum/{{ $psu->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                    <i class="glyphicon glyphicon-search"></i>
								</a>
                            </td>

                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="/fasosfasum/{{ $psu->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class=" ">
                                <a href="/fasosfasum/{{ $psu->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "permasbang")  
                            <td class=" ">
                                <a href="/fasosfasum/{{ $psu->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif

                            @if (auth()->user()->role == "superadmin")  
                            <td class="">
                                <a href="#" data-id="{{ $psu->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('fasosfasum', $psu->id) }}" id="delete{{ $psu->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class="">
                                <a href="#" data-id="{{ $psu->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('kependudukan', $psu->id) }}" id="delete{{ $psu->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "permasbang")  
                            <td class="">
                                <a href="#" data-id="{{ $psu->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('psu', $psu->id) }}" id="delete{{ $penduduk->id }}" method="post" >
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