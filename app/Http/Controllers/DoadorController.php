<?php

namespace App\Http\Controllers;

use App\Services\DoadorService;
use Exception;
use Illuminate\Http\Request;

class DoadorController extends Controller
{
    //
    public function __construct(
        private readonly DoadorService $doadorService
    ) {}

    public function createDoador(array $data) {
        try {
            $doador = $this->doadorService->createDoador($data);
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

    public function findDoadorById(int $id) {
        $doador = $this->doadorService->findDoadorById($id);

        if ($doador) {
            return response()->json([
                'success' => true,
                'doador' => $doador
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => "Erro: Doador não existe"
        ], 404);
    }

    public function getAllDoadores() {
        return $this->doadorService->getAllDoadores();
    }
}
