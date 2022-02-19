@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>Data Sarana Ibadah <small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Data Sarana Ibadah</div>
                    <div class="panel-body">
                    <a href="/ibadah/create" class="btn btn-primary my-2">Tambah Data</a>
                    <a href="/exportibadah" class="btn btn-success">Download Data</a>
                    <hr>

   <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Sarana Ibadah</p>
              <h3>{{$sarana_ibadah->count()}}</h3>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Masjid</p>
              <h3> {{ $sarana_ibadah->where('tipeibadah_id', '=', '1')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Gereja </p>
              <h3> {{ $sarana_ibadah->where('tipeibadah_id', '=', '2')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Musholla </p>
              <h3> {{ $sarana_ibadah->where('tipeibadah_id', '=', '3')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Pura</p>
              <h3> {{ $sarana_ibadah->where('tipeibadah_id', '=', '4')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Klenteng</p>
              <h3> {{ $sarana_ibadah->where('tipeibadah_id', '=', '5')->count() }}</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <p> Vihara</p>
              <h3> {{ $sarana_ibadah->where('tipeibadah_id', '=', '6')->count() }}</h3>
            </div>
          </div>
        </div>
      </div>     
                <div class="table-responsive">
                    <!-- <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="tabel_length"> 
                                    </div>
                                </div>
                            </div>
                        <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
                    </div> -->
                    <table id="ibadah" class="table table-bordered table-striped">
                    <thead>
                        <tr>                             
                            <th>NO</th>
                            <th>NAMA</th>
                            <th>JENIS SARANA</th>
                            <th>ALAMAT</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>PIMPINAN SARANA IBADAH</th>
                            <th>STATUS LAHAN</th>
                            <th>NO HP / TELP PENANGGUNGJAWAB</th>
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
    $('#ibadah').DataTable({
      processing:true,
      serverside:true,
      ajax:"{{route('ajax.get.data.ibadah')}}",
      columns:[
        {data:'DT_RowIndex', name:'DT_RowIndex'},
        {data:'nama_sarana_ibadah', name:'nama_sarana_ibadah'},
        {data:'tipeibadah', name:'tipeibadah'},
        {data:'alamat', name:'alamat'},
        {data:'rt', name:'rt'},
        {data:'rw', name:'rw'},
        {data:'nama_pimpinan', name:'nama_pimpinan'},
        {data:'status_lahan', name:'status_lahan'},
        {data:'no_hp', name:'no_hp'},
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
                  url: "{{ route('hapusibadah') }}",
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
                            $('#ibadah').DataTable().ajax.reload()
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

