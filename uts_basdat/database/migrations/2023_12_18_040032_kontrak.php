<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kontrak', function (Blueprint $table) {
            $table->id('ID_Kontrak');
            $table->date('Mulai_Kontrak')->nullable();
            $table->date('Akhir_Kontrak')->nullable();
            $table->integer('Harga')->nullable();
            $table->integer('Gaji')->nullable();
            $table->string('Agent', 255);
            $table->unsignedBigInteger('ID_Pemain')->nullable();
            $table->foreign('ID_Pemain')->references('ID_Pemain')->on('pemain');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontrak');
    }
};
