<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranaPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->String('nama_sarana_pendidikan');
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
        Schema::dropIfExists('sarana_pendidikan');
    }
}
