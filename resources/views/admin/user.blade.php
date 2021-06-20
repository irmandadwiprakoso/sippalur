@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data User <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">Data User</div>
                    <div class="panel-body">
                <!-- <hr> -->
                <div class="table-responsive">
                    <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="tabel_length"> 
                                </div>
                            </div>
                        </div>
                        <!-- <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div> -->
                    </div>
                    <table id="Datatables" class="table table-bordered table-striped">
                    <thead>
                        <tr>                          
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Reset</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
					<tbody>	
                    @foreach ($user as $user)
						<tr>
                            <td class=" "><center>{{ $loop->iteration}}</center></td>
                            <td class=" ">{{ $user->name}}</td>
                            <td class=" ">{{ $user->username}}</td>
                            <td class=" ">{{ $user->role}}</td>
                            <td class=" ">{{ $user->email}}</td>
                            <td class=" ">
                            <center>
                                <a href="/user/{{ $user->id}}/changepassword" class="btn btn-warning">
								    <i class="glyphicon glyphicon-pencil"></i>
								</a>
                            </center>
                            </td> 

                            <td class=" ">
                            <center>
                                <a href="#" data-id="{{ $user->id }}" class="btn btn-danger swal-confirm"><i class="fa fa-trash"></i>
                                <form action="{{ url('user', $user->id) }}" id="delete{{ $user->id }}" method="post" >
                                    @method('delete')
                                    @csrf
                                    </form>
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