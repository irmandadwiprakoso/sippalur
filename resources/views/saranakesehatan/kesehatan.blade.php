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
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkesehatan" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Tambah Data</a>

                    @elseif (auth()->user()->role == "kessos")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkesehatan" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "admin")  
                    <a href="/kesehatan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkesehatan" class="btn btn-success">Download Data</a>
                    @endif
                <hr>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
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

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Rumah Sakit</p>
              <h3> {{ $sarana_kesehatan->where('tipekesehatan_id', '=', '1')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Klinik</p>
              <h3> {{ $sarana_kesehatan->where('tipekesehatan_id', '=', '2')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Bidan</p>
              <h3> {{ $sarana_kesehatan->where('tipekesehatan_id', '=', '3')->count() }}</h3>
            </div>
          </div>
        </div>
      </div>
 
                <div class="table-responsive">
                    <!-- <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="tabel_length"> 
                                    </div>
                                </div>
                            </div>
                        <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
                    </div> -->
                    <table id="kesehatan" class="table table-bordered table-striped">
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
<!-- jQuery 3 -->
<script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/AdminLTE/plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/plugins/sweetalert/sweetalert2@11.js"></script>

<script>
  $(document).ready(function () {
    $('#kesehatan').DataTable({
      processing:true,
      serverside:true,
      ajax:"{{route('ajax.get.data.kesehatan')}}",
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'nama_sarana_kesehatan', name:'nama_sarana_kesehatan'},
        {data:'tipekesehatan', name:'tipekesehatan'},
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
                  url: "{{ route('hapuskesehatan') }}",
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
                            $('#kesehatan').DataTable().ajax.reload()
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