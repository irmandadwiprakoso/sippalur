@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Sarana Kesehatan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Sarana Kesehatan</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportkesehatan" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "kessos")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportkesehatan" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportkesehatan" class="btn btn-success">Export Data</a>
                    @endif
                <hr>

        <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Sarana Kesehatan</p>
              <h3>{{$sarana_kesehatan->count()}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-plus-round"></i>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Rumah Sakit</p>
              <h3> {{ $sarana_kesehatan->where('tipekesehatan_id', '=', '1')->count() }}</h3>
            </div>

          </div>
        </div>

        <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Klinik</p>
              <h3> {{ $sarana_kesehatan->where('tipekesehatan_id', '=', '2')->count() }}</h3>
            </div>

          </div>
        </div>

        <div class="row">
        <div class="col-lg-2 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Bidan</p>
              <h3> {{ $sarana_kesehatan->where('tipekesehatan_id', '=', '3')->count() }}</h3>
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
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Dokter/Pimpinan</th>
                            <th>Status Lahan</th>
                            <th>No HP</th>
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
                    @foreach ($sarana_kesehatan as $kesehatan)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $kesehatan->nama_sarana_kesehatan}}</td>
                            <td class=" ">{{ $kesehatan->Tipekesehatan->tipekesehatan}}</td>
                            <td class=" ">{{ $kesehatan->alamat}}</td>
                            <td class=" ">{{ $kesehatan->rt->rt}}</td>
                            <td class=" ">{{ $kesehatan->rw->rw}}</td>
                            <td class=" ">{{ $kesehatan->nama_pimpinan}}</td>
                            <td class=" ">{{ $kesehatan->status_lahan}}</td>
                            <td class=" ">{{ $kesehatan->no_hp}}</td>

                            @if (auth()->user()->role == "superadmin")  
                            <td class=" ">
                                <a href="/kesehatan/{{ $kesehatan->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "user")  
                            <td class=" ">
                                <a href="/kesehatan/{{ $kesehatan->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "kessos")  
                            <td class=" ">
                                <a href="/kesehatan/{{ $kesehatan->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                            @endif
                           
                            @if (auth()->user()->role == "superadmin") 
                            <td class=" ">
                            <a href="#" data-id="{{ $kesehatan->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('kesehatan', $kesehatan->id) }}" id="delete{{ $kesehatan->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
                            @elseif (auth()->user()->role == "kessos") 
                            <td class=" ">
                            <a href="#" data-id="{{ $kesehatan->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('kesehatan', $kesehatan->id) }}" id="delete{{ $kesehatan->id }}" method="post" >
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