<?php

namespace App\Http\Controllers;

use App\Services\FichaRegistroService;
use Illuminate\Http\Request;

class FichaRegistroController extends Controller
{
    public function __construct(
        private readonly FichaRegistroService $fichaRegistroService
    )
    {}

    public function createFichaRegistro(array $data)
    {
        $fichaCriada = $this->fichaRegistroService->createFichaRegistro($data);

        return response()->json([
            'success' => true,
        ]);
    }

    public function findFichaRegistroById(int $id) 
    {
        $fichaRegistro = $this->fichaRegistroService->findFichaRegistroById($id);

        if ($fichaRegistro) {
            return response()->json([
                'success' => true,
                'fichaRegistro' => $fichaRegistro
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function getAllFichaRegistros()
    {
        return response()->json([
            'success' => true,
            'fichasRegistro' => $this->fichaRegistroService->getAllFichaRegistros()
        ]);
    }
}
