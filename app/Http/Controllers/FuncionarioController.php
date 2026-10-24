<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Services\FuncionarioService;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function __construct(
        private readonly FuncionarioService $funcionarioService
    ) {}

    public function createFuncionario(array $data)
    {
        $funcionario = $this->funcionarioService->createFuncionario($data);
        return response()->json([
            'success' => true,
        ]); 
    }

    public function getAllFuncionarios() {
        return response()->json([
            'success' => true,    
            'funcionario' => $this->funcionarioService->getAllFuncionarios()]); 
    }

    public function findFuncionarioById(int $id) 
    {
        $funcionario = $this->funcionarioService->findFuncionarioById($id);

        if ($funcionario) {
            return response()->json([
                'success' => True,
                'doador' => $funcionario
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Erro: Funcionário não encontrado"
            ]);
        }
    }

}
