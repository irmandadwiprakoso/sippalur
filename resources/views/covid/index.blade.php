@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Covid-19</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "kessos")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Export Data</a>
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
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>RT Domisili</th>
                            <th>RW Domisili</th>
                            <th>Tanggal Konfirmasi</th>
                            <th>Status Pasien</th>
                            <th>Hasil Test</th>
                            <th>Status Akhir</th>
                            <th>Tanggal Status Akhir</th>
                            <th>View</th>
                            @if (auth()->user()->role == "superadmin")
                            <th>Edit</th>
                            <th>Delete</th>
                            @elseif (auth()->user()->role == "kessos")
                            <th>Edit</th>
                            <th>Delete</th>
                            @elseif (auth()->user()->role == "user")
                            <th>Edit</th>
                            @endif
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($covid19 as $covid)
						<tr style="background: red" >
                        <!-- <tr> -->
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $covid->warga->NIK}}</td>
                            <td class=" ">{{ $covid->warga->nama}}</td>
                            <td class=" ">{{ $covid->rt->rt}}</td>
                            <td class=" ">{{ $covid->rw->rw}}</td>
                            <td class=" ">{{ $covid->konfirmasi}}</td>
                            <td class=" ">{{ $covid->status_pasien}}</td>
                            <td class=" ">{{ $covid->hasil_test}}</td>
                            <td class=" ">{{ $covid->status_akhir}}</td>
                            <td class=" ">{{ $covid->tanggal_status_akhir}}</td>
                            
                            <td class=" ">
                                <a href="/covid19/{{ $covid->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                    <i class="glyphicon glyphicon-search"></i>
								</a>
                            </td>
                           
                            @if (auth()->user()->role == "superadmin")
                            <td class=" ">
                                <a href="/covid19/{{ $covid->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")
                            <td class=" ">
                                <a href="/covid19/{{ $covid->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "kessos")
                            <td class=" ">
                                <a href="/covid19/{{ $covid->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                           @endif

                            @if (auth()->user()->role == "superadmin")                            
                            <td class=" ">
                            <a href="#" data-id="{{ $covid->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('covid19', $covid->id) }}" id="delete{{ $covid->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "kessos")                            
                            <td class=" ">
                            <a href="#" data-id="{{ $covid->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('covid19', $covid->id) }}" id="delete{{ $covid->id }}" method="post" >
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