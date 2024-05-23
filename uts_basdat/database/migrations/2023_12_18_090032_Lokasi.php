<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Membuat tabel negara
        Schema::create('negara', function (Blueprint $table) {
            $table->id();
            $table->string('nama_negara');
            $table->timestamps();
        });

        // Membuat tabel provinsi
        Schema::create('provinsi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_provinsi');
            $table->unsignedBigInteger('negara_id');
            $table->timestamps();

            $table->foreign('negara_id')->references('id')->on('negara');
        });

        // Membuat tabel kota
        Schema::create('kota', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kota');
            $table->unsignedBigInteger('provinsi_id');
            $table->timestamps();

            $table->foreign('provinsi_id')->references('id')->on('provinsi');
        });

    }

    public function down()
    {
        Schema::dropIfExists('kota');
        Schema::dropIfExists('provinsi');
        Schema::dropIfExists('negara');
    }
};