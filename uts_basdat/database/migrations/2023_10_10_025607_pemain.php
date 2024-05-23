<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('pemain', function (Blueprint $table) {
            $table->id('ID_Pemain');
            $table->string('Nama_Pemain', 255);
            $table->date('Tanggal_Lahir')->nullable();
            $table->string('Tempat_Lahir', 255)->nullable();
            $table->integer('Tinggi_Badan')->nullable();
            $table->integer('Berat_Badan')->nullable();
            $table->string('Posisi_Pemain', 50);
            $table->integer('Nomor_Punggung')->nullable();
            $table->unsignedBigInteger('ID_Tim');
            $table->foreign('ID_Tim')->references('ID_Tim')->on('tim');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pemain');
    }
};
