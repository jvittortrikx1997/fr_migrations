<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlacklistsTable extends Migration
{
    public function up()
    {
        Schema::create('blacklist', function (Blueprint $table) {
            $table->uuid('blid')->primary();
            $table->uuid('pesid');
            $table->text('motivo');
            $table->date('data_inclusao');
            $table->timestamps();

            $table->foreign('pesid')->references('pesid')->on('pessoa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blacklist');
    }
};