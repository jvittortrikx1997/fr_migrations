<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BlacklistSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $pessoas = DB::table('pessoa')->pluck('pesid')->random(10);

        foreach ($pessoas as $pesid) {
            DB::table('blacklist')->insert([
                'blid' => Str::uuid(),
                'pesid' => $pesid,
                'motivo' => $faker->sentence,
                'data_inclusao' => $faker->date(),
            ]);
        }
    }
}
