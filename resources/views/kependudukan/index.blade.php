@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Kependudukan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Kependudukan</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/kependudukan/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "user") 
                    <a href="/kependudukan/create" class="btn btn-primary my-2">Insert Data</a>
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
                            <th>RT</th>
                            <th>RW</th>
                            <th>KK</th>
                            <th>Laki-Laki</th>
                            <th>Perempuan</th>
                            <th>Total (L+P)</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($kependudukan as $penduduk)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $penduduk->rt->rt}}</td>
                            <td class=" ">{{ $penduduk->rw->rw}}</td>
                            <td class=" ">{{ $penduduk->KK}}</td>
                            <td class=" ">{{ $penduduk->Laki_laki}}</td>
                            <td class=" ">{{ $penduduk->Perempuan}}</td>
                            <td class=" ">{{ $penduduk->Perempuan+$penduduk->Laki_laki}}</td>

                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="/kependudukan/{{ $penduduk->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class=" ">
                                <a href="/kependudukan/{{ $penduduk->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "pemtibum")  
                            <td class=" ">
                                <a href="/kependudukan/{{ $penduduk->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif

                            @if (auth()->user()->role == "superadmin")  
                            <td class="">
                                <a href="#" data-id="{{ $penduduk->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('kependudukan', $penduduk->id) }}" id="delete{{ $penduduk->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class="">
                                <a href="#" data-id="{{ $penduduk->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('kependudukan', $penduduk->id) }}" id="delete{{ $penduduk->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "pemtibum")  
                            <td class="">
                                <a href="#" data-id="{{ $penduduk->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('penduduk', $penduduk->id) }}" id="delete{{ $penduduk->id }}" method="post" >
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