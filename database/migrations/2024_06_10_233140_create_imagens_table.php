<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagensTable extends Migration
{
    public function up()
    {
        Schema::create('imagem', function (Blueprint $table) {
            $table->uuid('imgid')->primary();
            $table->uuid('pesid');
            $table->string('caminho_imagem');
            $table->timestamps();

            $table->foreign('pesid')->references('pesid')->on('pessoa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagem');
    }
};
