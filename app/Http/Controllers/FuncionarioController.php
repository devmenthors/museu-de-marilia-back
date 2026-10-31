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

    public function createFuncionario(Request $request)
    {
        $validatedData = $request->validate([
            'pessoa' => ['required', 'array'],
            'pessoa.nome_pessoa' => ['required', 'string'],
            'pessoa.cpf' => ['required', 'string'],
            'pessoa.email' => ['required', 'string'],

            'funcionario' => ['required', 'array'],
            'funcionario.senha' => ['required', 'string']
        ]);

        try {
            $funcionario = $this->funcionarioService->createFuncionario($validatedData);
            return response()->json([
                'success' => true,
                'funcionario' => $funcionario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
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
            return response()->json([
                'success' => true,
                'funcionario' => $funcionario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 404);
        }
    }

    public function updateFuncionario(int $id, Request $request) {
        $dataValidado = $request->validate([
            'pessoa' => ['array'],
            'pessoa.cpf' => ['string'],
            'pessoa.nome_pessoa' => ['string'],
            'pessoa.email' => ['string'],

            'funcionario' => ['array'],
            'funcionario.senha' => ['string']
        ]);

        try {
            $funcionario = $this->funcionarioService->updateFuncionario($id, $dataValidado);
            return response()->json([
                'success' => true,
                'funcionario' => $funcionario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function deleteFuncionario(int $id) {

        try {
            $funcionario = $this->funcionarioService->deleteFuncionario($id);
            return response()->json([
                'success' => true,
                'funcionario_deletado' => $funcionario
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

}
