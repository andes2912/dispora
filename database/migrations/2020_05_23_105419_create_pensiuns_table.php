<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensiuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_pangkat');
            $table->string('nip');
            $table->string('nama');
            $table->string('date_pensiun');
            $table->string('golongan');
            $table->string('kelas');
            $table->string('kedudukan');
            $table->string('gaji');
            $table->string('tunjangan');
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
        Schema::dropIfExists('pensiuns');
    }
}
