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

  <div class="row input-daterange">
    <div class="col-md-4">
       <input type="text" name="from_date" id="from_date" class="date form-control" placeholder="From Date"/>
    </div>
    <div class="col-md-4">
        <input type="text" name="to_date" id="to_date" class="date form-control" placeholder="To Date"/>
    </div>
    <div class="col-md-4">
        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
        <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
    </div>
    </div>
    <br/>                   
      <div class="divider"></div>
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

<script>
$(document).ready(function () {
//   fill_datatable();
//   $('.date').datepicker({  
//     todayBtn:'linked',
//     format:'yyyy-mm-dd',
//     autoclose:true
// });
//  function fill_datatable(from_date = '', to_date = '')
//  {
//   var dataTable = 

  $('#pamor').DataTable({
      processing:true,
      serverside:true,
      ajax: "{{route('ajax.get.data.pamor')}}",
    //   {
    //   url:"{{route('ajax.get.data.pamor')}}",
    //   data: {from_date:from_date, to_date:to_date}
    // },
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
// })


// $('#filter').click(function(){
//   var from_date = $('#from_date').val();
//   var to_date = $('#to_date').val();
//   if(from_date != '' &&  to_date != '')
//   {
//    $('#pamor').DataTable().destroy();
//    fill_datatable(from_date, to_date);
//   }
//   else
//   {
//   //  alert('Both Date is required');
//    Swal.fire({
//               icon: 'error',
//               title: 'Oops...',
//               text: 'Pilih dulu range tanggal nya',
//             })
//   }
//  });

//  $('#refresh').click(function(){
//   $('#from_date').val('');
//   $('#to_date').val('');
//   $('#pamor').DataTable().destroy();
//   fill_datatable();
//  });

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