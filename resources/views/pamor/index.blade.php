@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Laporan Kegiatan Harian Satgas Pamor <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Laporan Kegiatan Harian Satgas Pamor</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a>

                    @elseif (auth()->user()->role == "sekret") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "admin") 
                    <!-- <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a> -->
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>
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
                        <!-- <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div> -->
                    </div>
                    <table id="pamor" class="table table-bordered table-striped">
                    <thead>
                        <tr>                             
                            <th>NO</th>
                            <th>NAMA PAMOR</th>
                            <th>TANGGAL KEGIATAN</th>
                            <th>KEGIATAN</th>
                            <th>BIDANG</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>VIEW</th>
                            <th>EDIT</th>
                            <th>DELETE</th>

                            <!-- @if (auth()->user()->role == "superadmin")
                            <th>EDIT</th>
                            <th>DELETE</th>
                            @elseif (auth()->user()->role == "sekret")
                            <th>EDIT</th>
                            <th>DELETE</th>
                            @elseif (auth()->user()->role == "user")
                            <th>EDIT</th>
                            <th>DELETE</th>
                            @endif -->
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
  <!-- DataTables -->
<script src="/AdminLTE/plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/plugins/sweetalert/sweetalert2@11.js"></script>

<script>
  $(document).ready(function () {
    $('#pamor').DataTable({
      processing:true,
      serverside:true,
      responsive:true,
      ajax:"{{route('ajax.get.data.pamor')}}",
      // "order": [[ 2, "desc" ]],
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'name', name:'name'},
        {data:'tanggal', name:'tanggal'},
        {data:'kegiatan', name:'kegiatan'},
        {data:'bidang', name:'bidang'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'view', name:'view', orderable: false, searchable: false},
        {data:'edit', name:'edit', orderable: false, searchable: false},
        {data:'hapus', name:'hapus', orderable: false, searchable: false},
      ]
    })
    })

//HAPUS DATA
 $(document).on('click', '.hapus', function() {
      let id = $(this).attr('id')
        Swal.fire({
        title: 'Yakin Data Ini Mau dihapus? '+id ,
        text: "Data kamu bakal hilang loh.. Pikir-Pikir lagi yaa :) ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Gajadi',
        confirmButtonText: 'Iyaaa, Hapus aja'
            }).then((result) => {
                if (result.isConfirmed) {
                $.ajax({
                  url: "{{ route('hapuspamor') }}",
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
                            $('#pamor').DataTable().ajax.reload()
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