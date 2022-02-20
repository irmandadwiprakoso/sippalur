@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Pengurus RW <small> Kelurahan Jakasampurna </small></h1>
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
							<br>
			  	</div>										
			  </div>
		  </div>
		  <!-- </div> -->

            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data RW</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/ksbrw/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportksbrw" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user")
                    <a href="/ksbrw/create" class="btn btn-primary my-2">Tambah Data</a>

                    @elseif (auth()->user()->role == "pemtibum")
                    <a href="/ksbrw/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportksbrw" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "admin")
                    <a href="/exportksbrw" class="btn btn-success">Download Data</a>
                    @endif
                    <hr>

        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Ketua RW</p>
              <h3> {{ $ksbrw->where('jabatan_id', '=', '13')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Sekretaris RW</p>
              <h3> {{ $ksbrw->where('jabatan_id', '=', '14')->count() }}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p>Bendahara RW</p>
              <h3> {{ $ksbrw->where('jabatan_id', '=', '15')->count() }}</h3>
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
                    <table id="ksbrw" class="table table-bordered table-striped">
                    <thead>
                        <tr>                          
                        <th>NO</th>
                            <th>NIK</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>RW</th>
                            <th>MASA BHAKTI : Mulai</th>
                            <th>MASA BHAKTI : Berakhir</th>
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
  let rw  = $("#filter-rw").val()

  $(document).ready(function () {
    var table = $('#ksbrw').DataTable({
      processing:true,
      serverside:true,
      ajax:{
      url: "{{route('ajax.get.data.ksbrw')}}",
      data:function(d){
          d.rw = rw;
          return d
        }
      },
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'ktp_id', name:'ktp_id'},
        {data:'nama', name:'nama'},
        {data:'jabatan', name:'jabatan'},
        {data:'rw', name:'rw'},
        {data:'tmt_mulai', name:'tmt_mulai'},
        {data:'tmt_akhir', name:'tmt_akhir'},
        {data:'view', name:'view', orderable: false, searchable: false},
        {data:'edit', name:'edit', orderable: false, searchable: false},
        {data:'hapus', name:'hapus', orderable: false, searchable: false},
      ]
    })

      $(".filter").on('change', function(){
      rw  = $("#filter-rw").val()
      table.ajax.reload(null, false);
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
                  url: "{{ route('hapusksbrw') }}",
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
                            $('#ksbrw').DataTable().ajax.reload()
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