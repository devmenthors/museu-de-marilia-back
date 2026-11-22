<?php

namespace App\Http\Controllers;

use App\Services\ExposicaoService;
use Illuminate\Http\Request;

class ExposicaoController extends Controller
{
    public function __construct(
        private readonly ExposicaoService $exposicaoService
    )
    {}

    public function createExposicao(Request $request) 
    {
        $validatedData = $request->validate([
            'sala' => ['required', 'string'],
            'gongola' => ['required', 'string'],
            'ficha_doacao_id' => ['required', 'integer']
        ]);

        try {
            $exposicao = $this->exposicaoService->createExposicao($validatedData);

            return response()->json([
                'success' => true,
                'exposicao_criada' => $exposicao
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function updateExposicao(int $id, Request $request) 
    {
        $validatedData = $request->validate([
            'sala' => 'string',
            'gongola' => 'string',
        ]);
        
        try {
            $exposicao = $this->exposicaoService->updateExposicao($id, $validatedData);

            return response()->json([
                'success' => true,
                'exposicao_atualizada' => $exposicao
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function deleteExposicao(int $id) 
    { // dnv, se pa nem precisa
        try {
            $exposicao = $this->exposicaoService->deleteExposicao($id);

            return response()->json([
                'success' => true,
                'exposicao_deletada' => $exposicao
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function getAllExposicoes() 
    {
        try {
            $exposicoes = $this->exposicaoService->getAllExposicao();

            return response()->json([
                'success' => true,
                'exposicoes' => $exposicoes
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function findExposicaoById(int $id) 
    {
        try {
            $exposicao = $this->exposicaoService->findExposicaoById($id);

            return response()->json([
                'success' => true,
                'exposicao' => $exposicao
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 404);
        }
    }
}
