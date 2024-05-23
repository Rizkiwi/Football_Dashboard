<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('statistik_pemain_total', function (Blueprint $table) {
            $table->id('ID_Statistik');
            $table->unsignedBigInteger('ID_Pemain');
            $table->foreign('ID_Pemain')->references('ID_Pemain')->on('pemain'); // Sesuaikan dengan nama tabel pemain yang sesuai
            $table->integer('Menit_bermain');
            $table->integer('Jumlah_Gol');
            $table->integer('Jumlah_Assist');
            $table->integer('Tekel');
            $table->integer('Kartu_Kuning');
            $table->integer('Kartu_Merah');
            $table->integer('Penyelamatan');
            $table->integer('Clean_Sheet');
            $table->integer('Jumlah_Pertandingan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statistik_pemain');
    }
}
;
