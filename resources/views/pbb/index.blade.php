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
								<label class="col-sm-2 control-label">RW</label>
								<div class="col-xs-4">
								  <select class="form-control filter" name="filter-rw" id="filter-rw">
										<option value="">--Pilih RW--</option>
										<option value="1">RW 001</option>
										<option value="2">RW 002</option>
										<option value="3">RW 003</option>
										<option value="4">RW 004</option>
										<option value="5">RW 005</option>
										<option value="6">RW 06A</option>
										<option value="7">RW 06B</option>
										<option value="8">RW 007</option>
										<option value="9">RW 008</option>
										<option value="10">RW 009</option>
										<option value="11">RW 010</option>
										<option value="12">RW 011</option>
										<option value="13">RW 012</option>
										<option value="14">RW 013</option>
										<option value="15">RW 014</option>
										<option value="16">RW 015</option>
										<option value="17">RW 016</option>
										<option value="18">RW 017</option>
										<option value="19">RW 018</option>
										<option value="20">RW 019</option>
										<option value="21">RW 020</option>
										<option value="22">RW 021</option>
										<option value="23">RW 022</option>
									</select>
								</div>
              </div>
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
                    <a href="/exportpbb" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user") 
                    <a href="/exportpbb" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "permasbang") 
                    <a href="/pbb/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpbb" class="btn btn-success">Download Data</a>
                    
                    @elseif (auth()->user()->role == "admin") 
                    <a href="/pbb/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpbb" class="btn btn-success">Download Data</a>
                    @endif
                    <hr>

        <div class="row">
            <div class="col-lg-4 col-xs-6">
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

            <div class="col-lg-4 col-xs-6">
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

            <div class="col-lg-4 col-xs-6">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <p>WP DOUBLE</p>
                  <h3> {{ $pbb->where('KETERANGAN', '=', 'WP DOUBLE')->count() }}</h3>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-xs-6">
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

            <div class="col-lg-5 col-xs-6">
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

            <div class="col-lg-5 col-xs-6">
              <div class="small-box bg-red">
                <div class="inner">
                  <p>PERSENTASE PBB TERHUTANG</p>
                  <h3> {{ ($pbb->where('KETERANGAN', '=', 'TERHUTANG')->count() / $pbb->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100 }} %</h3>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-xs-6">
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

            <div class="col-lg-5 col-xs-6">
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

            <div class="col-lg-5 col-xs-6">
              <div class="small-box bg-blue">
                <div class="inner">
                  <p>PERSENTASE PBB LUNAS</p>
                  <h3> {{ ($pbb->where('KETERANGAN', '=', 'LUNAS')->count() / $pbb->where('TAHUN_SPPT', '=', date('Y'))->count()) * 100 }} %</h3>
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
    ,rw = $("#filter-rw").val()

$(document).ready(function () {
  var table =  $('#pbb').DataTable({
      processing:true,
      serverside:true,
      ajax: {
        url : "{{ route('ajax.get.data.pbb') }}",
        data:function(d){
          d.tahun = tahun;
          d.rw = rw;
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
          rw = $("#filter-rw").val()
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