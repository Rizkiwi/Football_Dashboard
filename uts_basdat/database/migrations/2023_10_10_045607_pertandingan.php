<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('pertandingan', function (Blueprint $table) {
            $table->id('ID_Pertandingan');
            $table->unsignedBigInteger('ID_Kompetisi');
            $table->date('Tanggal_Pertandingan')->nullable();
            $table->unsignedBigInteger('Tim_Tuan_Rumah');
            $table->unsignedBigInteger('Tim_Tamu');
            $table->integer('Skor_Tuan_Rumah')->nullable();
            $table->integer('Skor_Tamu')->nullable();
            $table->integer('Jumlah_Penonton')->nullable();
            $table->foreign('ID_Kompetisi')->references('ID_Kompetisi')->on('kompetisi');
            $table->foreign('Tim_Tuan_Rumah')->references('ID_Tim')->on('tim');
            $table->foreign('Tim_Tamu')->references('ID_Tim')->on('tim');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pertandingan');
    }
};
