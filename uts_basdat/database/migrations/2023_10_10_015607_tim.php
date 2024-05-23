<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tim', function (Blueprint $table) {
            $table->id('ID_Tim');
            $table->string('Nama_Tim', 255);
            $table->string('Kota_Asal', 255)->nullable();
            $table->date('Tahun_Berdiri')->nullable();
            $table->string('Asal_Negara', 50)->nullable();
            $table->unsignedBigInteger('ID_Kompetisi')->nullable();
            $table->foreign('ID_Kompetisi')->references('ID_Kompetisi')->on('kompetisi');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tim');
    }
};
