@extends('layout.master')
@section('title')

<section class="content-header">
      <h1>Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
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
								<label class="col-sm-2 control-label">Bulan</label>
								<div class="col-xs-4">
									<select class="form-control filter" name="filter-bulan" id="filter-bulan">
										<option value="">--Pilih Bulan--</option>
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
                  <div class="panel-heading">Data Covid-19</div>       
                    <div class="panel-body">
                    @if (auth()->user()->role == "superadmin")
                    <a href="/covid19/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Download Data</a>

                    @elseif (auth()->user()->role == "user")
                    <a href="/covid19/create" class="btn btn-primary my-2">Tambah Data</a>

                    @elseif (auth()->user()->role == "kessos")
                    <a href="/covid19/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Download Data</a>
                    
                    @elseif (auth()->user()->role == "admin")
                    <a href="/exportcovid19" class="btn btn-success">Download Data</a>
                    @endif
                    <hr>

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
            <p>TOTAL TERKONFIRMASI</p>
              <h3> {{ $covid19->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
            <p>TOTAL POSITIF</p>
            <h3> {{ $covid19->where('status_akhir', '=', 'Positif')->count() }}</h3>
            </div>
               <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
            <p>TOTAL NEGATIF</p>
            <h3> {{ $covid19->where('status_akhir', '=', 'Negatif')->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
            <p>TOTAL MENINGGAL</p>
            <h3> {{ $covid19->where('status_akhir', '=', 'Meninggal')->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive">
        <table id="covid" class="table table-bordered table-striped">
          <thead>
            <tr>                          
              <th>NO</th>
              <th>NIK</th>
              <th>NAMA</th>
              <th>RT</th>
              <th>RW</th>
              <th>TANGGAL KONFIRMASI</th>
              <th>STATUS PASIEN</th>
              <th>HASIL TEST </th>
              <th>STATUS AKHIR </th>
              <th>TANGGAL STATUS AKHIR</th>
              <th>VIEW</th>
              <th>EDIT</th>
              <th>HAPUS</th>
             </tr>
          </thead>
				</table>
      </div>
    </div>
</div>
</div>

      <!-- <div class="col-md-12">
				<div class="panel panel-white">
          <div id="chartCovid19"></div>
				</div>
		  </div> -->

</div>

<!-- jQuery 3 -->
<script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/AdminLTE/plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/plugins/sweetalert/sweetalert2@11.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>

<script>
    let rw  = $("#filter-rw").val()
    ,bulan = $("#filter-bulan").val()
    ,tahun = $("#filter-tahun").val()

  $(document).ready(function () {
    var table = $('#covid').DataTable({
      processing:true,
      serverside:true,
      ajax: {
        url: "{{ route('ajax.get.data.covid19') }}",
        data:function(d){
          d.rw = rw;
          d.bulan = bulan;
          d.tahun = tahun;
          return d
        }
      },  
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'ktp_id', name:'ktp_id'},
        {data:'nama', name:'nama'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'konfirmasi', name:'konfirmasi'},
        {data:'status_pasien', name:'status_pasien'},
        {data:'hasil_test', name:'hasil_test'},
        {data:'status_akhir', name:'status_akhir'},
        {data:'tanggal_status_akhir', name:'tanggal_status_akhir'},
        {data:'view', name:'view', orderable: false, searchable: false},
        {data:'edit', name:'edit', orderable: false, searchable: false},
        {data:'hapus', name:'hapus', orderable: false, searchable: false},
      ],
        "createdRow": function(row, data, dataIndex) {
        if (data["status_akhir"] == "Meninggal") {
          $(row).css("background-color", "Red");
          // $(row).addClass("warning");
        }
        if (data["status_akhir"] == "Positif") {
          $(row).css("background-color", "Orange");
          // $(row).addClass("warning");
        }
        if (data["status_akhir"] == "Negatif") {
          $(row).css("background-color", "lightgreen");
          // $(row).addClass("warning");
        }
      }
     })

    $(".filter").on('change', function(){
      rw  = $("#filter-rw").val()
      bulan  = $("#filter-bulan").val()
      tahun = $("#filter-tahun").val()
      table.ajax.reload(null, false);
      })
  })

//HAPUS DATA
 $(document).on('click', '.hapus', function() {
      let id = $(this).attr('id')
        Swal.fire({
        title: 'Yakin Data Ini Mau Dihapus? ' +id,
        text: "Data kamu bakal hilang loh.. Pikir-Pikir lagi yaa :)",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Gajadi Deh',
        confirmButtonText: 'Iyaaa, Hapus Aja'
            }).then((result) => {
                if (result.isConfirmed) {
                $.ajax({
                  url: "{{ route('hapus') }}",
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
                            $('#covid').DataTable().ajax.reload()
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

///////////////// CHART PBB ////////////////////

// Highcharts.chart('chartCovid19', {
//     chart: {
//         type: 'column'
//     },
//     title: {
//         text: 'Laporan Data Covid-19'
//     },
//     subtitle: {
//         text: 'Sumber: Dinas Kesehatan dan Pamor Kelurahan Jakasampurna'
//     },
//     xAxis: {
//         categories: [
//             'RW 001',
//             'RW 002',
//             'RW 003',
//             'RW 004',
//             'RW 005',
//             'RW 06A',
//             'RW 06B',
//             'RW 007',
//             'RW 008',
//             'RW 009',
//             'RW 010',
//             'RW 011',
//             'RW 012',
//             'RW 013',
//             'RW 014',
//             'RW 015',
//             'RW 016',
//             'RW 017',
//             'RW 018',
//             'RW 019',
//             'RW 020',
//             'RW 021',
//             'RW 022',
//         ],
//         crosshair: true
//     },
//     yAxis: {
//         min: 0,
//         title: {
//             text: 'Jumlah Pasien Covid-19'
//         }
//     },
//     tooltip: {
//         headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
//         footerFormat: '</table>',
//         shared: true,
//         useHTML: true
//     },
//     plotOptions: {
//         column: {
//             pointPadding: 0.2,
//             borderWidth: 0
//         }
//     },
//     series: [{
//         name: 'POSITIF',
//         data: [1,1,2,4,1,2,1,1,1,4,1,1,1,1,0,1,1,1,2,1,1,1,1,1,]
//     }, {
//         name: 'NEGATIF',
//         data: [1,1,2,4,1,2,1,1,1,4,1,1,1,1,0,1,1,1,2,1,1,1,1,1,]
//     }, {
//         name: 'MENINGGAL',
//         data: [1,1,2,4,1,2,1,1,1,4,1,1,1,1,0,1,1,1,2,1,1,1,1,1,]
//     }]
// });

</script>

@include('sweetalert::alert')
@endsection
