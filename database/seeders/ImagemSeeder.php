<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImagemSeeder extends Seeder
{
    public function run()
    {
        $homemPath = 'C:\\Users\\vitor\\Desktop\\TCC\\Homem';
        $mulherPath = 'C:\\Users\\vitor\\Desktop\\TCC\\Mulher';

        $homemCounter = 1;
        $mulherCounter = 1;

        $pessoas = DB::table('pessoa')->get();

        foreach ($pessoas as $pessoa) {
            $sexo = $pessoa->sexo;
            $nomeImagem = '';

            if ($sexo == 'M') {
                $nomeImagem = "HOMEM{$homemCounter}.jpg";
                $homemCounter++;
            } else {
                $nomeImagem = "MULHER{$mulherCounter}.jpg";
                $mulherCounter++;
            }

            $caminhoImagem = ($sexo == 'M' ? $homemPath : $mulherPath) . "\\$nomeImagem";

            DB::table('imagem')->insert([
                'imgid' => Str::uuid(),
                'pesid' => $pessoa->pesid,
                'caminho_imagem' => $caminhoImagem,
            ]);
        }
    }
}
