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
            $table->unsignedBigInteger('pangkat_id');
            $table->string('nip');
            $table->string('nama');
            $table->string('date_pensiun');
            $table->string('golongan');
            $table->string('kelas');
            $table->string('kedudukan');
            $table->timestamps();

            $table->foreign('pangkat_id')->references('id')->on('pangkats')->onDelete('cascade');
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
