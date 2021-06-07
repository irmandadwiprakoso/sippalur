<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovid19Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid19', function (Blueprint $table) {
            $table->id();
            $table->integer('warga_id');
            $table->date('konfirmasi');
            $table->string('status_pasien');
            $table->string('lokasi_pasien');
            $table->date('tanggal_status');
            $table->string('foto_status_pasien');
            $table->string('status_akhir');
            $table->date('tanggal_status_akhir');
            $table->string('foto_status_akhir');
            $table->string('no_hp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('covid19');
    }
}
