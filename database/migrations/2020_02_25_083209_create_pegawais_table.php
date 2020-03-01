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
            $table->UnsignedBigInteger('id_user');
            $table->string('nip');
            $table->string('tipepns');
            $table->string('nipbaru')->nullable();
            $table->string('nama');
            $table->string('ttl');
            $table->string('tempatlahir');
            $table->string('kelamin');
            $table->string('agama');
            $table->string('statusnikah');
            $table->string('kedudukanpns');
            $table->string('goldarah');
            $table->string('alamat');
            $table->string('nokarpeg')->nullable();;
            $table->string('noaskes')->nullable();;
            $table->string('notaspen')->nullable();;
            $table->string('nonpwp');
            $table->string('nokarsuskaris')->nullable();;
            $table->string('nik');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
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
