@extends('layout.master')

@section('title')

<section class="content-header">
      <h1>DATA SPPT PBB<small> Kelurahan Jakasampurna </small></h1>
</section>

<section class="content">		
		<div class="row">
            <div class="col-xs-12">
                <div class="panel panel-success">
                <div class="panel-heading">DATA SPPT PBB</div>
                    <div class="panel-body">

          <!-- Profile Image -->
          <div class="box box-primary">
                <li class="list-group-item ">
                  <b>NOP</b> <br> <a class="">{{ $pbb->NOP}}</a>
                </li>
                <li class="list-group-item">
                  <b>NAMA WAJIB PAJAK</b> <br> <a class="">{{ $pbb->NM_WP_SPPT}}</a>
                </li>
                <li class="list-group-item">
                  <b>TOTAL LUAS BUMI</b> <br> <a class="">{{ $pbb->TOTAL_LUAS_BUMI}}</a>
                </li>
                <li class="list-group-item">
                  <b>NJOP LUAS BUMI</b> <br> <a class="">{{ $pbb->NJOP_BUMI_SPPT}}</a>
                </li>
                <li class="list-group-item">
                  <b>TOTAL LUAS BANGUNAN</b> <br> <a class="">{{ $pbb->TOTAL_LUAS_BNG}}</a>
                </li>
                <li class="list-group-item">
                  <b>NJOP LUAS BANGUNAN</b> <br> <a class="">{{ $pbb->NJOP_BNG_SPPT}}</a>
                </li>
                <li class="list-group-item">
                  <b>ALAMAT OBJEK PAJAK</b> <br> <a class="">{{ $pbb->ALM_OP}}</a>
                </li>
                <li class="list-group-item">
                  <b>RT</b> <br> <a class="">{{ $pbb->rt->rt}}</a>
                </li>
                <li class="list-group-item">
                  <b>RW</b> <br> <a class="">{{ $pbb->rw->rw}}</a>
                </li>
                <li class="list-group-item">
                  <b>ALAMAT WAJIB PAJAK</b> <br> <a class="">{{ $pbb->ALM_WP}}</a>
                </li>
                <li class="list-group-item">
                  <b>PBB TERHUTANG</b> <br> <a class="">{{ $pbb->PBB_TERHUTANG_SPPT}}</a>
                </li>
                <li class="list-group-item">
                  <b>TAHUN SPPT</b> <br> <a class="">{{ $pbb->TAHUN_SPPT}}</a>
                </li>
                <li class="list-group-item">
                  <b>KETERANGAN</b> <br> <a class="">{{ $pbb->KETERANGAN}}</a>
                </li>
                <br>
              </ul>
                  <a href="/pbb/" class="btn btn-default">Close</a>
            </div>
      </div>
</section>
@endsection