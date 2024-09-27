<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PessoaJuridicaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $pessoas = DB::table('pessoa')->pluck('pesid');

        foreach ($pessoas as $pesid) {
            DB::table('pessoa_juridica')->insert([
                'pjid' => Str::uuid(),
                'pesid' => $pesid,
                'cnpj' => $faker->unique()->cnpj,
                'razao_social' => $faker->company,
            ]);
        }
    }
}
