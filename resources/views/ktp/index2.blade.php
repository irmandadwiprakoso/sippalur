@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Kependudukan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Detail Kependudukan</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/ktp/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "user")
                    <a href="/ktp/create" class="btn btn-primary my-2">Insert Data</a>
                    @endif
                <hr>

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Jumlah Data Penduduk</p>
              <h3>{{$ktp->count()}}</h3>
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
              <p>Jumlah Penduduk Jakasampurna</p>
              <h3> {{ $ktp->where('kelurahan', '=', 'Jakasampurna')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <p>Jumlah Data Laki-laki</p>
              <h3> {{ $ktp->where('jeniskelamin_id', '=', '1')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <p>Jumlah Data Perempuan</p>
              <h3> {{ $ktp->where('jeniskelamin_id', '=', '2')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
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
                            <th>KK</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
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
                    @foreach ($ktp as $katepe)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $katepe-> id}}</td>
                            <td class=" ">{{ $katepe-> KK}}</td>
                            <td class=" ">{{ $katepe-> nama}}</td>
                            <td class=" ">{{ $katepe-> tanggal_lahir}}</td>
                            <td class=" ">{{ $katepe-> alamat_KTP}}</td>
                            <td class=" ">{{ $katepe-> rt->rt}}</td>
                            <td class=" ">{{ $katepe-> rw->rw}}</td>
                            
                            <td class=" ">
                                <a href="/ktp/{{ $katepe->id}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View">  
                                    <i class="glyphicon glyphicon-search"></i>
								</a>
                            </td>
                           
                            @if (auth()->user()->role == "superadmin") 
                            <td class=" ">
                                <a href="/ktp/{{ $katepe->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "pemtibum") 
                            <td class=" ">
                                <a href="/ktp/{{ $katepe->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user") 
                            <td class=" ">
                                <a href="/ktp/{{ $katepe->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif
                            
                            @if (auth()->user()->role == "superadmin")                            
                            <td class=" ">
                            <a href="#" data-id="{{ $katepe->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ktp', $katepe->id) }}" id="delete{{ $katepe->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "pemtibum")                            
                            <td class=" ">
                            <a href="#" data-id="{{ $katepe->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ktp', $katepe->id) }}" id="delete{{ $katepe->id }}" method="post" >
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