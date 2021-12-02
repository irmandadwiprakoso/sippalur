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
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpendidikan" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Tambah Data</a>

                    @elseif (auth()->user()->role == "kessos")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpendidikan" class="btn btn-success">Download Data</a>
                    
                    @elseif (auth()->user()->role == "admin")  
                    <a href="/pendidikan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpendidikan" class="btn btn-success">Download Data</a>
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
                        <!-- <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div> -->
                    </div>
                    <table id="pendidikan" class="table table-bordered table-striped">
                    <thead>
                        <tr>                          
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>JENIS SARANA</th>
                            <th>ALAMAT</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>PIMPINAN</th>
                            <th>STATUS LAHAN</th>
                            <th>NO HP</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
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
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>PAUD</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '1')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>TK</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '2')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SD</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '3')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SMP</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '4')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SMA</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '5')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>SMK</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '6')->count() }}</h3>
            </div>
          </div>
        </div>
  
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>MI</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '7')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>MTs</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '8')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>MA</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '9')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>UNIVERSITAS</p>
              <h3> {{ $sarana_pendidikan->where('tipependidikan_id', '=', '10')->count() }}</h3>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div>

<!-- jQuery 3 -->
<script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/AdminLTE/plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/plugins/sweetalert/sweetalert2@11.js"></script>

<script>
  $(document).ready(function () {
    $('#pendidikan').DataTable({
      processing:true,
      serverside:true,
      ajax:"{{route('ajax.get.data.pendidikan')}}",
      // order: [[ 5, "asc" ]],
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'nama_sarana_pendidikan', name:'nama_sarana_pendidikan'},
        {data:'tipependidikan', name:'tipependidikan'},
        {data:'alamat', name:'alamat'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'nama_pimpinan', name:'nama_pimpinan'},
        {data:'status_lahan', name:'status_lahan'},
        {data:'no_hp', name:'no_hp'},
        {data:'edit', name:'edit', orderable: false, searchable: false},
        {data:'hapus', name:'hapus', orderable: false, searchable: false},
      ]
     })
  })

//HAPUS DATA
 $(document).on('click', '.hapus', function() {
      let id = $(this).attr('id')
        Swal.fire({
        title: 'Yakin Data Ini Mau Dihapus? ' +id,
        text: "Data kamu bakal hilang loh.. Pikir-Pikir lagi yaa :) ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Gajadi',
        confirmButtonText: 'Iyaaa, Hapus Aja'
            }).then((result) => {
                if (result.isConfirmed) {
                $.ajax({
                  url: "{{ route('hapuspendidikan') }}",
                  type: 'post',
                  data: { 
                      id: id,
                     _token: "{{ csrf_token() }}"
                },
                    success: function (res, status) {
                    if (status = '200') {
                      setTimeout(() => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Data Kamu Berhasil Terhapus',
                            showConfirmButton: false,
                            timer: 1500
                          }).then((res) => {
                            $('#pendidikan').DataTable().ajax.reload()
                          })
                      });
                    }
                  },
                    error : function (xhr) {
                      Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Terjadi Kesalahan!',
                      })
                    }
                })
              }
            })
       })
</script>


 

@include('sweetalert::alert')
@endsection

