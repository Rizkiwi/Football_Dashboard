<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    public function up()
    {
        Schema::create('kompetisi', function (Blueprint $table) {
            $table->id('ID_Kompetisi');
            $table->string('Nama_Kompetisi', 255);
            $table->date('Tanggal_Mulai')->nullable();
            $table->date('Tanggal_Berakhir')->nullable();
            $table->string('Juara', 255)>nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('kompetisi');
    }
};
