<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EnderecoSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $pessoas = DB::table('pessoa')->pluck('pesid');

        foreach ($pessoas as $pesid) {
            DB::table('endereco')->insert([
                'endid' => Str::uuid(),
                'pesid' => $pesid,
                'rua' => $faker->streetName,
                'cidade' => $faker->city,
                'estado' => $faker->state,
                'cep' => $faker->postcode,
            ]);
        }
    }
}
