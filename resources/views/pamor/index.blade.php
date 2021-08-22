@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Laporan Kegiatan Harian Satgas Pamor <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Laporan Kegiatan Harian Satgas Pamor</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportpamor" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "sekret") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportpamor" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportpamor" class="btn btn-success">Export Data</a>
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
                            <th>Tanggal</th>
                            
                            <th>Kegiatan</th>
                            <th>Bidang</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>View</th>
                            @if (auth()->user()->role == "superadmin")
                            <th>Edit</th>
                            <th>Delete</th>
                            @elseif (auth()->user()->role == "sekret")
                            <th>Edit</th>
                            <th>Delete</th>
                            @elseif (auth()->user()->role == "user")
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($pamor as $pamor)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $pamor->tanggal}}</td>
                                                      
                            <td class=" ">{{ $pamor->kegiatan}}</td>
                            <td class=" ">{{ $pamor->bidang}}</td>
                            <td class=" ">{{ $pamor->rt->rt}}</td>
                            <td class=" ">{{ $pamor->rw->rw}}</td>                           
                                                   
                            <td class=" ">
                                <a href="/pamor/{{ $pamor->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                    <i class="glyphicon glyphicon-search"></i>
								</a>
                            </td>

                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="/pamor/{{ $pamor->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class=" ">
                                <a href="/pamor/{{ $pamor->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "sekret")  
                            <td class=" ">
                                <a href="/pamor/{{ $pamor->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif

                            @if (auth()->user()->role == "superadmin")  
                            <td class="">
                                <a href="#" data-id="{{ $pamor->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('pamor', $pamor->id) }}" id="delete{{ $pamor->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class="">
                                <a href="#" data-id="{{ $pamor->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('pamor', $pamor->id) }}" id="delete{{ $pamor->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "sekret")  
                            <td class="">
                                <a href="#" data-id="{{ $pamor->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('pamor', $pamor->id) }}" id="delete{{ $pamor->id }}" method="post" >
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