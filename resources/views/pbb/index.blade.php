@extends('layout.master')

@section('title')


<section class="content-header">
      <h1>PAJAK BUMI DAN BANGUNAN <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
<div class="row">

    <div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
                <div class="row">
								  <label class="col-sm-2 control-label">Tahun</label>
								  <div class="col-xs-4">
									<input class="form-control filter" id="filter-tahun" type="text" name="filter-tahun" value="{{ date('Y') }}">
								  </div>
							  </div>
							<br>
					</div>										
				</div>
		</div>

            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">SPPT PBB</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/pbb/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="#" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user") 
                    <!-- <a href="/pbb/create" class="btn btn-primary my-2">Tambah Data</a> -->
                    <a href="#" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "permasbang") 
                    <a href="/pbb/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="#" class="btn btn-success">Download Data</a>
                    
                    @elseif (auth()->user()->role == "admin") 
                    <!-- <a href="/pbb/create" class="btn btn-primary my-2">Tambah Data</a> -->
                    <!-- <a href="#" class="btn btn-success">Download Data</a> -->
                    @endif
                    <hr>

        <div class="row">
            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-yellow">
                <div class="inner">
                  <p>JUMLAH SPPT PBB</p>
                  <h3> {{ $pbb->where('TAHUN_SPPT', '=', date('Y'))->count() }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
                <div class="inner">
                  <p>WP TIDAK DIKETAHUI</p>
                  <h3> {{ $pbb->where('KETERANGAN', '=', 'TIDAK DIKETAHUI')->count() }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>WP DOUBLE</p>
                  <h3> {{ $pbb->where('KETERANGAN', '=', 'DOUBLE')->count() }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <p>WP TERHUTANG</p>
                  <h3>  {{ $pbb->where('KETERANGAN', '=', 'TERHUTANG')->count() }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <p>TOTAL PBB TERHUTANG</p>
                  <h3> Rp. {{ number_format ($pbb->where('KETERANGAN', '=', 'TERHUTANG')->sum('PBB_TERHUTANG_SPPT') ) }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <p>WP LUNAS</p>
                  <h3> {{ $pbb->where('KETERANGAN', '=', 'LUNAS')->count() }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-xs-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <p>TOTAL PBB LUNAS</p>
                  <h3> Rp. {{ number_format ($pbb->where('KETERANGAN', '=', 'LUNAS')->sum('PBB_TERHUTANG_SPPT') )}}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
      </div>

          <div class="table-responsive">
           <table id="pbb" class="table table-bordered table-striped">
             <thead>
                <tr>                             
                  <th>NO</th>
                  <th>NOP</th>
                  <th>NAMA WAJIB PAJAK</th>
                  <th>ALAMAT OBJEK PAJAK</th>
                  <th>LUAS BUMI</th>
                  <th>RT</th>
                  <th>RW</th>
                  <th>PBB TERHUTANG</th>
                  <th>KETERANGAN</th>
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
<script src="https://code.highcharts.com/highcharts.src.js"></script>

<script>
    let tahun = $("#filter-tahun").val()

$(document).ready(function () {
  var table =  $('#pbb').DataTable({
      processing:true,
      serverside:true,
      ajax: {
        url : "{{ route('ajax.get.data.pbb') }}",
        data:function(d){
          d.tahun = tahun;
          return d
        }
    },
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'NOP', name:'NOP'},
        {data:'NM_WP_SPPT', name:'NM_WP_SPPT'},
        {data:'ALM_OP', name:'ALM_OP'},
        {data:'TOTAL_LUAS_BUMI', name:'TOTAL_LUAS_BUMI'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'PBB_TERHUTANG_SPPT', name: 'PBB_TERHUTANG_SPPT'},
        {data:'KETERANGAN', name:'KETERANGAN'},
        {data:'view', name:'view', orderable: false, searchable: false},
        {data:'edit', name:'edit', orderable: false, searchable: false},
        {data:'hapus', name:'hapus', orderable: false, searchable: false},
      ]
    })
        $(".filter").on('change', function(){
          tahun = $("#filter-tahun").val()
          table.ajax.reload(null, false);
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
                  url: "{{ route('hapuspbb') }}",
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
                            $('#pbb').DataTable().ajax.reload()
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