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
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "user")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    @elseif (auth()->user()->role == "kessos")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Export Data</a>
                    @elseif (auth()->user()->role == "admin")
                    <a href="/covid19/create" class="btn btn-primary my-2">Insert Data</a>
                    <a href="/exportcovid19" class="btn btn-success">Export Data</a>
                    @endif
                    <hr>

            <div class="row">
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <p>Terkonfirmasi</p>
                        <h3> {{ $covid19->count() }}</h3>
                    </div>
                        <div class="icon">
                        <i class="ion ion-person"></i>
                        </div>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p>Jumlah Positif</p>
                        <h3> {{ $covid19->where('status_akhir', '=', 'Positif')->count() }}</h3>
                    </div>
                        <div class="icon">
                        <i class="ion ion-person"></i>
                        </div>
                </div>
            </div>

            <!-- <div class="row">
            <div class="col-lg-1 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p> Isoman </p>
                        <h3> {{ $covid19->where('status_pasien', '=', 'Isoman')->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-1 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <p> RS </p>
                        <h3> {{ $covid19->where('status_pasien', '=', 'Perawatan')->count() }}</h3>
                    </div>
                </div>
            </div> -->

            <div class="row">
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <p>Jumlah Negatif</p>
                        <h3> {{ $covid19->where('status_akhir', '=', 'Negatif')->count() }}</h3>
                    </div>
                        <div class="icon">
                        <i class="ion ion-person"></i>
                        </div>
                </div>
            </div>
        
            <div class="row">
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <p>Jumlah Meninggal</p>
                        <h3> {{ $covid19->where('status_akhir', '=', 'Meninggal')->count() }}</h3>
                    </div>
                        <div class="icon">
                        <i class="ion ion-person"></i>
                        </div>
                </div>
            </div>
        
        </div>
        </div>
        </div>
        </div>
        <!-- </div>
        </div> -->
                    <div class="table-responsive">
                    <div id="tabel_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row">
                        <!-- <div class="col-md-4">
                        <label for="">Filter Status Akhir</label>
                            <select name="status_akhir" id="filter_status_akhir" class="form-control filter">
                                <option value="">Pilih Status Akhir</option>
                                <option value="Positif">POSITIF</option>
                                <option value="Negatif">NEGATIF</option>
                                <option value="Meniggal">MENINGGAL</option>                 
                            </select>
                        </div> -->
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="tabel_length"> 
                                    </div>
                                </div>
                            </div>
                        <div id="tabel_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
                    </div>
                    
                    <div class="divider"></div>
                    <table id="covid" class="table table-bordered table-striped">
                    <thead>
                        <tr>                          
                            <th>No</th>
                            <th>NIK</th>
                            <th>NAMA</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>TANGGAL KONFIRMASI</th>
                            <th>STATUS PASIEN</th>
                            <th>HASIL TEST PASIEN</th>
                            <th>STATUS AKHIR PASIEN</th>
                            <th>TANGGAL STATUS AKHIR</th>
                            <th>VIEW</th>
                            @if (auth()->user()->role == "superadmin")
                            <th>EDIT</th>
                            <th>DELETE</th>
                            @elseif (auth()->user()->role == "kessos")
                            <th>EDIT</th>
                            <th>DELETE</th>
                            @elseif (auth()->user()->role == "user")
                            <th>EDIT</th>
                            @endif
                        </tr>
                    </thead>
					<tbody>	
                    
                            </tbody>
				        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>	
<!-- $(".filter").on('change',function(){
    console.log("FILTER")
}) -->
@endsection
