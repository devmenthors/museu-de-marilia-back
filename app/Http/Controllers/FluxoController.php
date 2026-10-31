<?php

namespace App\Http\Controllers;

use App\Services\FluxoService;
use Illuminate\Http\Request;
use Exception;

class FluxoController extends Controller
{
    public function __construct(
        private readonly FluxoService $fluxoService
        )
    {}

    public function getAllFluxos()
    {
        try {
            $fluxos = $this->fluxoService->getAllFluxos();
            return response()->json([
                'success' => true,
                'fluxos' => $fluxos
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }

    public function findFluxoById(int $id)
    {
        try {
            $fluxo = $this->fluxoService->findFluxoById($id);

            if ($fluxo) {
                return response()->json([
                    'success' => true,
                    'fluxo' => $fluxo
                ]);
            }
            return response()->json([
                'success' => false
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }   
    }

    public function createFluxo(array $data)
    {
        try {
            $fluxo = $this->fluxoService->createFluxo($data);
    
            if ($fluxo) {
                return response()->json([
                    'success' => true
                ]);
            } 
            return response()->json([
                'success' => false,
                'message' => "Erro: Erro ao cadastrar o Produto"
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }
}
