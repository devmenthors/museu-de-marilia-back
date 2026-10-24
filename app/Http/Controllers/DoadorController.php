<?php

namespace App\Http\Controllers;

use App\Services\DoadorService;
use Illuminate\Http\Request;

class DoadorController extends Controller
{
    //
    public function __construct(
        private readonly DoadorService $doadorService
    ) {}

    public function createDoador(array $data) {
        $doador = $this->doadorService->createDoador($data);
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
        ]);
    }

    public function getAllDoadores() {
        return $this->doadorService->getAllDoadores();
    }
}
