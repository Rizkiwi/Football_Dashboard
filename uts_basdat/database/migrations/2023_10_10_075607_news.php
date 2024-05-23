<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id('ID_Berita');
            $table->string('penulis');
            $table->text('isi_berita');
            $table->string('gambar_berita')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
;




