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
            <hr>
                <div class="table-responsive">
                    <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-sm-6">
                            
                                <div class="dataTables_length" id="tabel_length">
                                <a href="/ibadah/create" class="btn btn-primary my-2">Insert Data</a>                             
                                </div>
                            
                            </div>
                        </div>
                    </div> 
                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="Datatabel" aria-describedby="tabel_info" style="width: 1055px;">
                    <thead>
                        <tr>                          
                            <th scope="col" style="width: 29px;">No</th>
                            <th scope="col" style="width: 124px;">Nama</th>
                            <th scope="col" style="width: 150px;">Tipe</th>
                            <th scope="col" style="width: 100px;">Alamat</th>
                            <th scope="col" style="width: 100px;">RT</th>
                            <th scope="col" style="width: 100px;">RW</th>
                            <th scope="col" style="width: 100px;">Nama Pimpinan</th>
                            <th scope="col" style="width: 44px;">Edit</th>
                            <th scope="col" style="width: 52px;">Delete</th>
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

                            
                            <td class=" ">
                                <a href="/ibadah/{{ $ibadah->id}}/edit" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </td>
                           
                            <td>
                                <a href="#" data-id="{{ $ibadah->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                    <form action="{{ url('ibadah', $ibadah->id) }}" id="delete{{ $ibadah->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
								</a>
                            </td>
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

