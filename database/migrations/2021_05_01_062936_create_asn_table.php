<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asn', function (Blueprint $table) {
            $table->id();
            $table->char('NIP',18);
            $table->char('NIK', 16);
            $table->String('nama');
            $table->String('pangkat');
            $table->String('golongan');
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->String('jenis_kelamin');
            $table->String('alamat');
            $table->String('agama');
            $table->String('status');
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
        Schema::dropIfExists('asn');
    }
}
