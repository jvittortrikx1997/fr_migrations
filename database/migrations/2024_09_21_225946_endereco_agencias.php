<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnderecoAgencias extends Migration
{
    public function up()
    {
        Schema::create('endereco_agencias', function (Blueprint $table) {
            $table->uuid('endereco_id')->primary();
            $table->uuid('agencia_id');
            $table->string('rua');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->timestamps();

            $table->foreign('agencia_id')->references('agencia_id')->on('agencias_certificadoras')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('endereco_agencias');
    }
}
