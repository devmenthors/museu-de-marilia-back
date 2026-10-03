<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnderecoService;

class EnderecoController extends Controller
{

    public function __construct(
        private readonly EnderecoService $enderecoService
    ) {}
    
    public function populateDatabase()
    {
        // Lógica para popular o banco de dados

    }

    public function createEndereco(Request $request) {
        $data = [
            'logradouro' => $request->input('logradouro'),
            'numero' => $request->input('numero'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'cep' => $request->input('cep')
        ];
        $endereco = $this->enderecoService->createEndereco($data);
        return response()->json($endereco, 201);
    }
}