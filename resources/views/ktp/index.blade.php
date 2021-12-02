@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Penduduk <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Detail Kependudukan</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/ktp/create" class="btn btn-primary my-2">Tambah Data</a>
                    @elseif (auth()->user()->role == "user")
                    <a href="/ktp/create" class="btn btn-primary my-2">Tambah Data</a>
                    @elseif (auth()->user()->role == "pemtibum")
                    <a href="/ktp/create" class="btn btn-primary my-2">Tambah Data</a>
                    @endif
                <hr>

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <p>PENDUDUK JAKASAMPURNA</p>
              <h3> {{ $ktp->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <p>JUMLAH LAKI-LAKI</p>
            <h3> {{ $ktp->where('jeniskelamin_id', '=', '1')->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <p>JUMLAH PEREMPUAN</p>
            <h3> {{ $ktp->where('jeniskelamin_id', '=', '2')->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->        
  
        <!-- ./col -->
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
                    <table id="ktp" class="table table-bordered table-striped">
                    <thead>
                        <tr>                          
                            <th>No</th>
                            <th>NIK</th>
                            <th>KK</th>
                            <th>NAMA</th>
                            <th>TANGGAL LAHIR</th>
                            <th>ALAMAT</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>VIEW</th>
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
    $('#ktp').DataTable({
      processing:true,
      serverside:true,
      ajax:"{{route('ajax.get.data.ktp')}}",
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'id', name:'id'},
        {data:'KK', name:'KK'},
        {data:'nama', name:'nama'},
        {data:'tanggal_lahir', name:'tanggal_lahir'},
        {data:'alamat_KTP', name:'alamat_KTP'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'view', name:'view', orderable: false, searchable: false},
        {data:'edit', name:'edit', orderable: false, searchable: false},
        {data:'hapus', name:'hapus', orderable: false, searchable: false},
      ],
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
                  url: "{{ route('hapusktp') }}",
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
                            $('#ktp').DataTable().ajax.reload()
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