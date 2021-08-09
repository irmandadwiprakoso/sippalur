<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pns', function (Blueprint $table) {
            $table->id();
            $table->char('NIP',18);
            $table->char('NIK',16);
            $table->String('nama');
            $table->integer('pangkat_id');
            $table->integer('golongan_id');
            $table->integer('jabatan_id');
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('jeniskelamin_id');
            $table->String('alamat');
            $table->integer('agama_id');
            $table->integer('pendidikanpeg_id');
            $table->integer('statuskawin_id');
            $table->date('SK_jabatan');
            $table->String('no_rek');
            $table->String('npwp');
            $table->String('email');
            $table->String('no_HP');
            $table->String('foto');
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
        Schema::dropIfExists('pns');
    }
}
