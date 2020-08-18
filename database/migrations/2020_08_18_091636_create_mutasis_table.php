<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pangkat');
            $table->string('nip');
            $table->string('nama');
            $table->string('no_surat');
            $table->string('perihal');
            $table->string('tgl_mutasi');
            $table->string('tgl_masuk');
            $table->string('jabatan_lama');
            $table->string('jabatan_baru');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('id_pangkat')->references('id')->on('pangkats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutasis');
    }
}
