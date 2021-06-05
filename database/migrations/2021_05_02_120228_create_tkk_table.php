<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkk', function (Blueprint $table) {
            $table->id();
            $table->char('NIK', 16);
            $table->String('nama');
            $table->String('KK', 16);
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->String('jenis_kelamin');
            $table->String('alamat');
            $table->String('agama');
            $table->String('pendidikan');
            $table->String('status_perkawinan');
            $table->date('SK_Tkk');
            $table->String('no_rek', 13);
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
        Schema::dropIfExists('tkk');
    }
}
