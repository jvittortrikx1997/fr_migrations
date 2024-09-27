<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PessoaSeeder::class,
            EnderecoSeeder::class,
            PessoaJuridicaSeeder::class,
            BlacklistSeeder::class,
            ImagemSeeder::class,
            AgenciasCertificadorasSeeder::class,
        ]);
    }
}