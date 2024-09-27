<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaJuridicasTable extends Migration
{
    public function up()
    {
        Schema::create('pessoa_juridica', function (Blueprint $table) {
            $table->uuid('pjid')->primary();
            $table->uuid('pesid');
            $table->string('cnpj');
            $table->string('razao_social');
            $table->timestamps();

            $table->foreign('pesid')->references('pesid')->on('pessoa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoa_juridica');
    }
};
