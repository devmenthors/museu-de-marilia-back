<?php

namespace App\Http\Controllers;

use App\Services\FichaRegistroService;
use Illuminate\Http\Request;
use Exception;

class FichaRegistroController extends Controller
{
    public function __construct(
        private readonly FichaRegistroService $fichaRegistroService
    )
    {}

    public function createFichaRegistro(array $data)
    {
        try {
            $fichaCriada = $this->fichaRegistroService->createFichaRegistro($data);
            return response()->json([
                'success' => true,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }

    public function findFichaRegistroById(int $id) 
    {
        try {
            $fichaRegistro = $this->fichaRegistroService->findFichaRegistroById($id);
            if ($fichaRegistro) {
                return response()->json([
                    'success' => true,
                    'fichaRegistro' => $fichaRegistro
                ]);
            }
            
            return response()->json([
                'success' => false
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }

    public function getAllFichaRegistros()
    {
        try {
            $fichasRegistradas = $this->fichaRegistroService->getAllFichaRegistros();
            return response()->json([
                'success' => true,
                'fichasRegistro' => $fichasRegistradas
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }
}
