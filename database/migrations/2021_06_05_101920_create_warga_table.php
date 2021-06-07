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
            $table->String('alamat_domisili');
            $table->integer('rt_id');
            $table->integer('rw_id');
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
