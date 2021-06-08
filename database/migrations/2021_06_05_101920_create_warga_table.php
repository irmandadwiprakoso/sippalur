<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->char('NIK', 16);
            $table->String('nama');
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->String('alamat KTP');
            $table->String('rt_id');
            $table->String('rw_id');
            $table->String('kelurahan');
            $table->string('kecamatan');
            $table->string('kota/kab');
            $table->string('propinsi');
            $table->integer('agama_id');
            $table->integer('statuskawin_id');
            $table->integer('jeniskelamin_id');
            $table->String('pekerjaan');
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
        Schema::dropIfExists('warga');
    }
}
