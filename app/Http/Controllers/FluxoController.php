<?php

namespace App\Http\Controllers;

use App\Services\FluxoService;
use Illuminate\Http\Request;

class FluxoController extends Controller
{
    public function __construct(
        private readonly FluxoService $fluxoService
        )
    {}

    public function getAllFluxos()
    {
        return response()->json([
            'success' => true,
            'fluxos' => $this->fluxoService->getAllFluxos()
        ]);
    }

    public function findFluxoById(int $id)
    {
        $fluxo = $this->fluxoService->findFluxoById($id);

        if ($fluxo) {
            return response()->json([
                'success' => true,
                'fluxo' => $fluxo
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function createFluxo(array $data)
    {
        $fluxo = $this->fluxoService->createFluxo($data);

        if ($fluxo) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Erro: Erro ao cadastrar o Produto"
            ]);
        }
    }
}
