@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data RT <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data RT</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/ksbrt/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportksbrt" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user")
                    <a href="/ksbrt/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "pemtibum")
                    <a href="/ksbrt/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportksbrt" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")
                    <a href="/ksbrt/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportksbrt" class="btn btn-success">Export Data</a>
                    @endif
                    <hr>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Ketua RT</p>
              <h3> {{ $ksbrt->where('jabatan_id', '=', '13')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
       
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Sekretaris RT</p>
              <h3> {{ $ksbrt->where('jabatan_id', '=', '14')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Bendahara RT</p>
              <h3> {{ $ksbrt->where('jabatan_id', '=', '15')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

      </div>
      </div>
      </div>
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
                            <th>Jabatan</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Masa Bhakti : Mulai</th>
                            <th>Masa Bhakti : Berakhir</th>
                            <th>View</th>
                            @if (auth()->user()->role == "superadmin")
                            <th>Edit</th>
                            <th>Delete</th>
                            @elseif (auth()->user()->role == "pemtibum")
                            <th>Edit</th>
                            <th>Delete</th>
                            @elseif (auth()->user()->role == "user")
                            <th>Edit</th>
                            @endif
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($ksbrt as $ksb)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $ksb->ktp->id}}</td>
                            <td class=" ">{{ $ksb->ktp->nama}}</td>
                            <td class=" ">{{ $ksb->jabatan->jabatan}}</td>
                            <td class=" ">{{ $ksb->rt->rt}}</td>
                            <td class=" ">{{ $ksb->rw->rw}}</td>
                            <td class=" ">{{ $ksb->tmt_mulai}}</td>
                            <td class=" ">{{ $ksb->tmt_akhir}}</td>
                            
                            <td class=" ">
                                <a href="/ksbrt/{{ $ksb->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                    <i class="glyphicon glyphicon-search"></i>
								</a>
                            </td>
                           
                            @if (auth()->user()->role == "superadmin")
                            <td class=" ">
                                <a href="/ksbrt/{{ $ksb->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")
                            <td class=" ">
                                <a href="/ksbrt/{{ $ksb->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "pemtibum")
                            <td class=" ">
                                <a href="/ksbrt/{{ $ksb->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif

                            @if (auth()->user()->role == "superadmin")                            
                            <td class=" ">
                            <a href="#" data-id="{{ $ksb->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ksbrt', $ksb->id) }}" id="delete{{ $ksb->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "pemtibum")                            
                            <td class=" ">
                            <a href="#" data-id="{{ $ksb->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ksbrt', $ksb->id) }}" id="delete{{ $ksb->id }}" method="post" >
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