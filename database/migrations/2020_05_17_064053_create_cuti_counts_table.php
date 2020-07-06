<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiCountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuti_counts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cuti');
            $table->string('nip');
            $table->integer('batas');
            $table->integer('sisa');
            $table->integer('taken');
            $table->timestamps();

            $table->foreign('id_cuti')->references('id')->on('cutis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuti_counts');
    }
}
