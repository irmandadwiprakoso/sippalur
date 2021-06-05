<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranaIbadahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana_ibadah', function (Blueprint $table) {
            $table->id();
            $table->String('nama_sarana_ibadah');
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
        Schema::dropIfExists('sarana_ibadah');
    }
}
