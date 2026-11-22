<?php

namespace App\Http\Controllers;

use App\Services\EmAnaliseService;
use Illuminate\Http\Request;

class EmAnaliseController extends Controller
{
    public function __construct(
        private readonly EmAnaliseService $emAnaliseService
    )
    {}

    public function createEmAnalise(Request $request) 
    {
        $validatedData = $request->validate([
            'parecer_tec' => 'string',
            'apto_incorporado' => 'boolean',
            'apto_exposicao' => 'boolean',
            'obs_laudo' => 'string',
            'aprovado' => 'boolean',
            'ficha_doacao_id' => ['required', 'integer']
        ]);

        try {
            $emAnalise = $this->emAnaliseService->createEmAnalise($validatedData);

            return response()->json([
                'success' => true,
                'em_analise_criado' => $emAnalise
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function updateEmAnalise(int $id, Request $request) 
    {
        $validatedData = $request->validate([
            'parecer_tec' => 'string',
            'apto_incorporado' => 'boolean',
            'apto_exposicao' => 'boolean',
            'obs_laudo' => 'string',
            'aprovado' => 'boolean',
            'ficha_doacao_id' => 'integer'
        ]);
        
        try {
            $emAnalise = $this->emAnaliseService->updateEmAnalise($id, $validatedData);

            return response()->json([
                'success' => true,
                'em_analise_atualizado' => $emAnalise
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function deleteEmAnalise(int $id) 
    { // dnv, se pa nem precisa
        try {
            $emAnalise = $this->emAnaliseService->deleteEmAnalise($id);

            return response()->json([
                'success' => true,
                'em_analise_deletado' => $emAnalise
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function getAllEmAnalises() 
    {
        try {
            $emAnalises = $this->emAnaliseService->getAllEmAnalise();

            return response()->json([
                'success' => true,
                'em_analises' => $emAnalises
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function findEmAnaliseById(int $id) 
    {
        try {
            $emAnalise = $this->emAnaliseService->findEmAnaliseById($id);

            return response()->json([
                'success' => true,
                'em_analise' => $emAnalise
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 404);
        }
    }
}
