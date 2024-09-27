<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AgenciasCertificadorasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('pt_BR');

        for ($i = 1; $i <= 20; $i++) {
            $agenciaId = Str::uuid();

            // Inserindo agência certificadora
            DB::table('agencias_certificadoras')->insert([
                'agencia_id' => $agenciaId,
                'nome' => $faker->company,
                'cnpj' => $faker->unique()->cnpj,
                'email' => $faker->companyEmail,
                'telefone' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Inserindo endereço da agência certificadora
            DB::table('endereco_agencias')->insert([
                'endereco_id' => Str::uuid(),
                'agencia_id' => $agenciaId,
                'rua' => $faker->streetName,
                'cidade' => $faker->city,
                'estado' => $faker->state,
                'cep' => $faker->postcode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
