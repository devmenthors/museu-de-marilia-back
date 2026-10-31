<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnderecoService;
use Exception;

class EnderecoController extends Controller
{

    public function __construct(
        private readonly EnderecoService $enderecoService
    ) {}

    public function findEnderecoById(string $cpf, int $id)
    {
        $endereco = $this->enderecoService->findEnderecoById($cpf, $id);
        if ($endereco) {
            return response()->json($endereco);
        } else {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }
    }

    public function getAllEnderecos(string $cpf) { // mostra somente enderecos do doador do CPF X
        try {
            $enderecos = $this->enderecoService->getAllEnderecos($cpf);
            return response()->json($enderecos);
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }

    public function createEndereco(Request $request) {
        $data = $request->validate([
            'logradouro' => ['required', 'string'],
            'numero' => ['required', 'integer'],
            'bairro' => ['required', 'string'],
            'cidade' => ['required', 'string'],
            'estado' => ['required', 'string'],
            'cep' => ['required', 'max:8'],
            'complemento' => ['nullable', 'string'],
            'doador_cpf' => ['required', 'integer'] // será transformado no id depois
        ]);

        try {
            $endereco = $this->enderecoService->createEndereco($data);
            return response()->json($endereco, 201);
            
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }
}