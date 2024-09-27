<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciasCertificadorasTable extends Migration
{
    public function up()
    {
        Schema::create('agencias_certificadoras', function (Blueprint $table) {
            $table->uuid('agencia_id')->primary();
            $table->string('nome');
            $table->string('cnpj')->unique();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agencias_certificadoras');
    }
};

