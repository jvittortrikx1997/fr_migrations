<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;
use App\Models\Imagem;
use Illuminate\Support\Facades\Http;

class PessoaController extends Controller
{
    public function enviarParaApi($pesid)
    {
        $pessoa = Pessoa::find($pesid);
        dd($pessoa);
        $endereco = Endereco::where('pesid', $pesid)->first();
        $imagem = Imagem::where('pesid', $pesid)->first();

        if (!$pessoa || !$endereco || !$imagem) {
            return response()->json(['error' => 'Dados não encontrados'], 404);
        }

        $imagemCaminho = storage_path('app/' . $imagem->caminho);

        if (!file_exists($imagemCaminho)) {
            return response()->json(['error' => 'Imagem não encontrada'], 404);
        }

        $response = Http::attach(
            'imagem', file_get_contents($imagemCaminho), 'imagem.jpg'
        )->post('http://127.0.0.1:8000/check', [
            'nome' => $pessoa->nome,
            'email' => $pessoa->email,
            'logradouro' => $endereco->logradouro,
            'cidade' => $endereco->cidade,
            'estado' => $endereco->estado,
        ]);

        return $response->json();
    }
}
