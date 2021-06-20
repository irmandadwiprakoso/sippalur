<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRtrwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rtrw', function (Blueprint $table) {
            $table->id();
            $table->integer('warga_id');
            $table->integer('jabatan_id');
            $table->string('rt_id');
            $table->string('rw_id');
            $table->string('no_sk');
            $table->date('tmt');
            $table->string('no_hp');
            $table->string('no_rek');
            $table->string('npwp');
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
        Schema::dropIfExists('rtrw');
    }
}
