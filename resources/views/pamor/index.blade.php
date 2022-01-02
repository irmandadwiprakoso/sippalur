@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Laporan Kegiatan Harian Satgas Pamor <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">	
		<div class="row">
     <div class="col-md-12">
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="row">
							<input type="hidden" name="cari" value="1">

							<div class="row">
								<label class="col-sm-2 control-label">Bulan</label>
								<div class="col-xs-4">
									<select class="form-control filter" name="filter-bulan" id="filter-bulan">
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">Nopember</option>
										<option value="12">Desember</option>
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
							</form>					
						</div>										
					</div>
				</div>
			</div>

            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Laporan Kegiatan Harian Satgas Pamor</div>
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "sekret") 
                    <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>
                    
                    @elseif (auth()->user()->role == "admin") 
                    <!-- <a href="/pamor/create" class="btn btn-primary my-2">Tambah Data</a> -->
                    <a href="/exportpamor" class="btn btn-success">Download Data</a>
                    @endif
                    <hr>

        <div class="table-responsive">
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

<script type="text/javascript">
    let bulan  = $("#filter-bulan").val()
    ,tahun = $("#filter-tahun").val()

$(document).ready(function () {
  var table =  $('#pamor').DataTable({
      processing:true,
      serverside:true,
      ajax: {
        url : "{{route('ajax.get.data.pamor')}}",
        data:function(d){
          d.bulan = bulan;
          d.tahun = tahun;
          return d
      }
    },
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
  


  $(".filter").on('change', function(){
    bulan  = $("#filter-bulan").val()
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