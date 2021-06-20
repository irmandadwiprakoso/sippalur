<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranaKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->String('nama_sarana_kesehatan');
            $table->String('tipekesehatan_id');
            $table->String('alamat');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->String('nama_pimpinan');
            $table->String('status_lahan');
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
        Schema::dropIfExists('sarana_kesehatan');
    }
}
