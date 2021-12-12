@extends('layout.master')
@section('title')

<section class="content-header">
      <h1>Data Covid-19 <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
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
                    <!-- <a href="/covid19/create" class="btn btn-primary my-2">Tambah Data</a> -->
                    <a href="/exportcovid19" class="btn btn-success">Download Data</a>
                    @endif
                    <hr>

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <p>TERKONFIRMASI</p>
              <h3> {{ $covid19->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <p>POSITIF</p>
            <h3> {{ $covid19->where('status_akhir', '=', 'Positif')->count() }}</h3>
            </div>
               <div class="icon">
               <i class="ion ion-person-add"></i>
             </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <p>NEGATIF</p>
            <h3> {{ $covid19->where('status_akhir', '=', 'Negatif')->count() }}</h3>
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
            <p>MENINGGAL</p>
            <h3> {{ $covid19->where('status_akhir', '=', 'Meninggal')->count() }}</h3>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- <div class="table-responsive">
         <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <div class="row">
              <div class="col-sm-6">
                <div class="dataTables_length" id="tabel_length"> 
                </div>
                </div>
              </div>
         <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
         </div> -->

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Filter Data Covid-19</h3>
  </div>
      <div class="row">
          <div class="col-md-4"></div>
              <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_status_pasien" id="filter_status_pasien" class="form-control" required>
                          <option value="">--STATUS PASIEN--</option>
                          <option value="Isoman">ISOLASI MANDIRI</option>
                          <option value="Perawatan">DIRAWAT</option>
                        </select>   
                    </div>
                    <div class="form-group">
                        <select name="filter_status_akhir" id="filter_status_akhir" class="form-control" required>
                          <option value="">--STATUS AKHIR--</option>
                            <option value="Positif">POSITIF</option>
                            <option value="Negatif">NEGATIF</option>
                            <option value="Meninggal">MENINGGAL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="filter_rw" id="filter_rw" class="form-control" required>
                          <option value="">--RW--</option>
                          <option value="1">001</option>
                          <option value="2">002</option>
                          <option value="3">003</option>
                          <option value="4">004</option>
                          <option value="5">005</option>
                          <option value="6">06A</option>
                          <option value="7">06B</option>
                          <option value="8">007</option>
                          <option value="9">008</option>
                          <option value="10">009</option>
                          <option value="11">010</option>
                          <option value="12">011</option>
                          <option value="13">012</option>
                          <option value="14">013</option>
                          <option value="15">014</option>
                          <option value="16">015</option>
                          <option value="17">016</option>
                          <option value="18">017</option>
                          <option value="19">018</option>
                          <option value="20">019</option>
                          <option value="21">020</option>
                          <option value="22">021</option>
                          <option value="23">022</option>
                          <option value="24">000</option>
                        </select>
                    </div>
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

      </div>              
      <div class="divider"></div>
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
</div>
   
  

<!-- jQuery 3 -->
<script src="/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/AdminLTE/plugins/DataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script src="/AdminLTE/plugins/sweetalert/sweetalert2@11.js"></script>

<script>
  $(document).ready(function () {
    fill_datatable();

    function fill_datatable(filter_status_pasien = '', filter_status_akhir = '', filter_rw = '')
    {
    var dataTable = $('#covid').DataTable({
      processing:true,
      serverside:true,
      ajax: {
        url: "{{ route('ajax.get.data.covid19') }}",
        data: {filter_status_pasien:filter_status_pasien, filter_status_akhir:filter_status_akhir, filter_rw:filter_rw}
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
     });
    }
  

  $('#filter').click(function(){
        var filter_status_pasien = $('#filter_status_pasien').val();
        var filter_status_akhir = $('#filter_status_akhir').val();
        var filter_rw = $('#filter_rw').val();

        if(filter_status_pasien != '' &&  filter_status_pasien != '' && filter_rw != '')
        {
            $('#covid').DataTable().destroy();
            fill_datatable(filter_status_pasien, filter_status_akhir, filter_rw);
        }
        else
        {
            // alert('Select Both filter option');
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Pilih dulu yoo mau filter apa',
            })
        }

    });

    $('#reset').click(function(){
        $('#filter_status_pasien').val('');
        $('#filter_status_akhir').val('');
        $('#filter_rw').val('');
        $('#covid').DataTable().destroy();
        fill_datatable();
    });
  });
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
</script>

@include('sweetalert::alert')
@endsection
