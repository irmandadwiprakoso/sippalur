@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Sarana Ibadah <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Sarana Ibadah</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/ibadah/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportibadah" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user") 
                    <a href="/ibadah/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "kessos") 
                    <a href="/ibadah/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportibadah" class="btn btn-success">Export Data</a>
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
                            <th>Nama Sarana Peribadatan</th>
                            <th>Jenis Sarana Peribadatan</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Ketua DKM/Pengurus/Pendeta</th>
                            <th>Status Lahan</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($sarana_ibadah as $ibadah)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $ibadah->nama_sarana_ibadah}}</td>
                            <td class=" ">{{ $ibadah->Tipeibadah->tipeibadah}}</td>
                            <td class=" ">{{ $ibadah->alamat}}</td>
                            <td class=" ">{{ $ibadah->rt->rt}}</td>
                            <td class=" ">{{ $ibadah->rw->rw}}</td>
                            <td class=" ">{{ $ibadah->nama_pimpinan}}</td>
                            <td class=" ">{{ $ibadah->status_lahan}}</td>

                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="/ibadah/{{ $ibadah->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class=" ">
                                <a href="/ibadah/{{ $ibadah->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "kessos")  
                            <td class=" ">
                                <a href="/ibadah/{{ $ibadah->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif

                            @if (auth()->user()->role == "superadmin")  
                            <td class="">
                                <a href="#" data-id="{{ $ibadah->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ibadah', $ibadah->id) }}" id="delete{{ $ibadah->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                      
                            @elseif (auth()->user()->role == "kessos")  
                            <td class="">
                                <a href="#" data-id="{{ $ibadah->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ibadah', $ibadah->id) }}" id="delete{{ $ibadah->id }}" method="post" >
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

