<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukus extends Migration
{

    // "php artisan make:migration create_bukus"
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->char('kode', 12);
            $table->string('judul', 255);
            $table->string('penulis', 255);
            $table->string('penerbit', 255);
            $table->string('tahun_terbit', 255);
            $table->char('stok', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
