<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->uuid('pesid')->primary();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->enum('sexo', ['M', 'F']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
};
