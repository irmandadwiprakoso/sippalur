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
            $table->integer('user_id');
            $table->char('NIK', 16);
            $table->String('nama');
            $table->String('KK', 16);
            $table->String('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('jeniskelamin_id');
            $table->String('alamat');
            $table->integer('agama_id');
            $table->integer('pendidikanpeg_id');
            $table->integer('statuskawin_id');
            $table->integer('seksi_id');
            $table->integer('jabatan_id');
            $table->date('SK_Tkk');
            $table->String('no_rek');
            $table->String('npwp');
            $table->String('email');
            $table->String('no_HP');
            $table->String('foto');
            $table->String('username');
            $table->String('rw_id');
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
