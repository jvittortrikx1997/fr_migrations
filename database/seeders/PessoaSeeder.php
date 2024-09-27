<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PessoaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('pt_BR');
        $sexos = ['M', 'F'];

        for ($i = 1; $i <= 100; $i++) {
            $sexo = $i <= 57 ? 'M' : 'F';
            $nome = $sexo == 'M' ? $faker->firstNameMale : $faker->firstNameFemale;

            DB::table('pessoa')->insert([
                'pesid' => Str::uuid(),
                'nome' => $nome . ' ' . $faker->lastName,
                'data_nascimento' => $faker->date(),
                'sexo' => $sexo,
            ]);
        }
    }
}
