@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Kependudukan <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Kependudukan</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/kependudukan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkependudukan" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user") 
                    <a href="/kependudukan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkependudukan" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "pemtibum") 
                    <a href="/kependudukan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkependudukan" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "admin") 
                    <a href="/kependudukan/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportkependudukan" class="btn btn-success">Download Data</a>
                    @endif
                    <hr>

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Jumlah KK</p>
              <h3>{{$kependudukan->sum('KK')}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <p>Jumlah Laki-laki</p>
              <h3>{{$kependudukan->sum('Laki_laki')}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <p>Jumlah Perempuan</p>
              <h3>{{$kependudukan->sum('Perempuan')}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Jumlah Jiwa</p>
              <h3>{{$kependudukan->sum('Perempuan')+$kependudukan->sum('Laki_laki')}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
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
                    <table id="kependudukan" class="table table-bordered table-striped">
                    <thead>
                        <tr>                             
                            <th>NO</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>KK</th>
                            <th>LAKI-LAKI</th>
                            <th>PEREMPUAN</th>
                            <th>TOTAL JIWA(L+P)</th>
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
    $('#kependudukan').DataTable({
      processing:true,
      serverside:true,
      ajax:"{{route('ajax.get.data.kependudukan')}}",
      // order: [[ 2, "asc" ]],
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'KK', name:'KK'},
        {data:'Laki_laki', name:'Laki_laki'},
        {data:'Perempuan', name:'Perempuan'},
        {data:'total', name:'total'},
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
                  url: "{{ route('hapuskependudukan') }}",
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
                            $('#kependudukan').DataTable().ajax.reload()
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