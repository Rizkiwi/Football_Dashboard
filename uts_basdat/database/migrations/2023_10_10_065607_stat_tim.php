<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('statistik_tim', function (Blueprint $table) {
            $table->id('ID_Statistik_Tim');
            $table->unsignedBigInteger('ID_Tim');
            $table->integer('Point');
            $table->integer('Menang');
            $table->integer('Seri');
            $table->integer('Kalah');
            $table->integer('Gol_Memasukkan');
            $table->integer('Gol_Kemasukkan');
            $table->string('Musim', 20);
            $table->unsignedBigInteger('ID_Kompetisi');
            $table->foreign('ID_Tim')->references('ID_Tim')->on('tim');
            $table->foreign('ID_Kompetisi')->references('ID_Kompetisi')->on('kompetisi');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('statistik_tim');
    }
}
;
