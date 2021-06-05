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
            $table->String('tipe');
            $table->String('alamat');
            $table->char('RT',3);
            $table->char('RW',3);
            $table->String('nama_pimpinan');
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
