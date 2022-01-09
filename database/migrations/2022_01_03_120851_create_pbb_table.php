<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePbbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbb', function (Blueprint $table) {
            $table->id();
            $table->string('NOP');
            $table->string('NM_WP_SPPT');
            $table->integer('TOTAL_LUAS_BUMI');
            $table->integer('NJOP_BUMI_SPPT');
            $table->integer('TOTAL_LUAS_BNG');
            $table->integer('NJOP_BNG_SPPT');
            $table->string('ALM_OP');
            $table->integer('rt_id');
            $table->integer('rw_id');
            $table->string('ALM_WP');
            $table->integer('PBB_TERHUTANG_SPPT');
            $table->integer('TAHUN_SPPT');
            $table->string('KETERANGAN');
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
        Schema::dropIfExists('pbb');
    }
}
