<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Services\FuncionarioService;
use Exception;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function __construct(
        private readonly FuncionarioService $funcionarioService
    ) {}

    public function createFuncionario(array $data)
    {
        try {
            $funcionario = $this->funcionarioService->createFuncionario($data);
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

    public function getAllFuncionarios() {
        try {
            $funcionarios = $this->funcionarioService->getAllFuncionarios();
            return response()->json([
                'success' => true,    
                'funcionarios' => $funcionarios
            ]); 

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }

    public function findFuncionarioById(int $id) 
    {
        try {
            $funcionario = $this->funcionarioService->findFuncionarioById($id);
    
            if ($funcionario) {
                return response()->json([
                    'success' => True,
                    'doador' => $funcionario
                ]);
            } 
            return response()->json([
                'success' => false,
                'message' => "Erro: Funcionário não encontrado"
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }

}
