@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data User <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Hak Akses User</div>
                    <div class="panel-body">
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
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Reset Password</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($user as $u)
						<tr>
                            <td class=" ">{{ $loop->iteration}}</td>
                            <td class=" ">{{ $u->name}}</td>
                            <td class=" ">{{ $u->username}}</td>
                            <td class=" ">{{ $u->role}}</td>
                            <td class=" ">{{ $u->email}}</td>
                             
                            <td class=" ">
                            <center>
                                <a href="/user/{{ $u->id}}/changepassword" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </center>
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