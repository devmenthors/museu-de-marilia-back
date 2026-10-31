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
    
    public function populateDatabase()
    {
        // Lógica para popular o banco de dados

    }

    public function findEnderecoById(int $id)
    {
        $endereco = $this->enderecoService->findEnderecoById($id);
        if ($endereco) {
            return response()->json($endereco);
        } else {
            return response()->json(['message' => 'Endereço não encontrado'], 404);
        }
    }

    public function getAllEnderecos() {
        try {
            $enderecos = $this->enderecoService->getAllEnderecos();
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
            'logradouro' => ['required'],
            'numero' => ['required'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
            'cep' => ['required', 'max:8'],
            'complemento' => ['nullable', 'string']
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