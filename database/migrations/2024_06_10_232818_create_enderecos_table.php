<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->uuid('endid')->primary();
            $table->uuid('pesid');
            $table->string('rua');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->timestamps();

            $table->foreign('pesid')->references('pesid')->on('pessoa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('endereco');
    }

};
