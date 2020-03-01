<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('id_pegawai');
            $table->string('nip');
            $table->string('nama');
            $table->string('tgl');
            $table->string('jam_masuk');
            $table->string('jam_keluar')->nullable();
            $table->string('status');
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_pegawai')->references('id')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absens');
    }
}
