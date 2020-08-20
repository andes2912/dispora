<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->string('nip');
            $table->string('tipepns');
            $table->integer('nipbaru')->nullable();
            $table->string('nama');
            $table->string('ttl')->nullable();
            $table->string('tempatlahir')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('statusnikah')->nullable();
            $table->string('kedudukanpns')->nullable();
            $table->string('goldarah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nokarpeg')->nullable();
            $table->string('noaskes')->nullable();
            $table->string('notaspen')->nullable();
            $table->string('nonpwp')->nullable();
            $table->string('nokarsuskaris')->nullable();
            $table->string('nik')->nullable();
            $table->string('foto')->nullable();
            $table->integer('pangkat_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
