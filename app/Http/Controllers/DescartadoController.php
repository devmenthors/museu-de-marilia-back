<?php

namespace App\Http\Controllers;

use App\Services\DescartadoService;
use Illuminate\Http\Request;

class DescartadoController extends Controller
{
    public function __construct(
        private readonly DescartadoService $descartadoService
    )
    {}

    public function createDescartado(Request $request) 
    {
        $validatedData = $request->validate([
            'justificativa_descartado' => ['required', 'string'],
            'ficha_doacao_id' => ['required', 'integer']
        ]);

        try {
            $descartado = $this->descartadoService->createDescartado($validatedData);

            return response()->json([
                'success' => true,
                'descartado_criado' => $descartado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function updateDescartado(int $id, Request $request) 
    {
        $validatedData = $request->validate([
            'justificativa_descartado' => 'string',
        ]);
        
        try {
            $descartado = $this->descartadoService->updateDescartado($id, $validatedData);
            
            return response()->json([
                'success' => true,
                'descartado_atualizado' => $descartado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function deleteDescartado(int $id) 
    { // dnv, se pa nem precisa
        try {
            $descartado = $this->descartadoService->deleteDescartado($id);

            return response()->json([
                'success' => true,
                'descartado_deletado' => $descartado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function getAllDescartados() 
    {
        try {
            $descartados = $this->descartadoService->getAllDescartado();

            return response()->json([
                'success' => true,
                'descartados' => $descartados
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function findDescartadoById(int $id) 
    {
        try {
            $descartado = $this->descartadoService->findDescartadoById($id);

            return response()->json([
                'success' => true,
                'descartado' => $descartado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 404);
        }
    }
}
