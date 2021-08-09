@extends('layout.master')

@section('title')


<section class="content-header">
      <h1>Data Sarana Pendidikan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Sarana Pendidikan</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportpendidikan" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "kessos")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportpendidikan" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportpendidikan" class="btn btn-success">Export Data</a>
                    @endif
                    <hr>
          
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Jumlah Sarana Pendidikan</p>
              <h3>{{$sarana_pendidikan->count()}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
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
                        <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
                    </div>
                    <table id="Datatables" class="table table-bordered table-striped">
                    <thead>
                        <tr>                          
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Nama Kepsek/Pimpinan</th>
                            <th>Status Lahan</th>
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
                            @foreach ($sarana_pendidikan as $pendidikan)
						                <tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $pendidikan->nama_sarana_pendidikan}}</td>
                            <td class=" ">{{ $pendidikan->Tipependidikan->tipependidikan}}</td>
                            <td class=" ">{{ $pendidikan->alamat}}</td>
                            <td class=" ">{{ $pendidikan->rt->rt}}</td>
                            <td class=" ">{{ $pendidikan->rw->rw}}</td>
                            <td class=" ">{{ $pendidikan->nama_pimpinan}}</td>
                            <td class=" ">{{ $pendidikan->status_lahan}}</td>

                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="/pendidikan/{{ $pendidikan->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								                <i class="glyphicon glyphicon-pencil"></i></a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class=" ">
                                <a href="/pendidikan/{{ $pendidikan->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								                <i class="glyphicon glyphicon-pencil"></i></a>
                            </td>
                            @elseif (auth()->user()->role == "kessos")  
                            <td class=" ">
                                <a href="/pendidikan/{{ $pendidikan->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								                <i class="glyphicon glyphicon-pencil"></i></a>
                            </td>
                            @endif
 
                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="#" data-id="{{ $pendidikan->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('pendidikan', $pendidikan->id) }}" id="delete{{ $pendidikan->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								                </a>
                            </td>
                            @elseif (auth()->user()->role == "kessos")  
                            <td class=" ">
                                <a href="#" data-id="{{ $pendidikan->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('pendidikan', $pendidikan->id) }}" id="delete{{ $pendidikan->id }}" method="post" >
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

      <div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-tag"></i> Rekapitulasi Data Sarana Pendidikan</h3>
        </div>
        <div class="box-body">
     
        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>PAUD</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '1')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>TK</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '2')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SD</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '3')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SMP</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '4')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SMA</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '5')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SMK</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '6')->count() }}</h3>
            </div>
          </div>
        </div>
  
        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>MI</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '7')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>MTs</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '8')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>MA</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '9')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-1 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Universitas</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '10')->count() }}</h3>
            </div>
          </div>
        </div>

</section>  

@endsection

