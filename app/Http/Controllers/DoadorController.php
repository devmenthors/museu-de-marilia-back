<?php

namespace App\Http\Controllers;

use App\Services\DoadorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoadorController extends Controller
{
    //
    public function __construct(
        private readonly DoadorService $doadorService
    ) {}

    public function createDoador(Request $request) {
        $validatedData = $request->validate([
            /* tem q vir a parte de pessoa separada e doador */
            'pessoa' => ['required', 'array'],
            'pessoa.nome_pessoa' => ['required', 'string'],
            'pessoa.cpf' => ['required', 'string'],
            'pessoa.email' => ['required', 'string'],

            'doador' => ['required', 'array'],
            'doador.telefone' => ['required', 'string'],
        ]);

        $validatedData['doador']['funcionario_id'] = 1; //Auth::id()
        
        try {
        $doador = $this->doadorService->createDoador($validatedData);
            return response()->json([
                'success' => true,
                'doador_criado' => $doador
            ], 200); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function findDoadorById(int $id) {
        $doador = $this->doadorService->findDoadorById($id);

        if ($doador) {
            return response()->json([
                'success' => true,
                'doador' => $doador
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Erro: Doador não existe"
        ], 404);
    }

    public function getAllDoadores() {
        return $this->doadorService->getAllDoadores();
    }

    public function updateDoador(int $id, Request $request) {
        $validatedData = $request->validate([
            /* tem q vir a parte de pessoa separada e doador */
            'pessoa' => 'array',
            'pessoa.nome_pessoa' => 'string',
            'pessoa.cpf' => 'string',
            'pessoa.email' => 'string',

            'doador' => 'array',
            'doador.telefone' => 'string',
        ]);

        try {
            $doador = $this->doadorService->updateDoador($id, $validatedData);

            return response()->json([
                'success' => true,
                'doador_atualizado' => $doador
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'ERRO: ' . $e->getMessage()
            ], 400);
        }
    }

    public function deleteDoador(int $id) {
        try {
            $doador = $this->doadorService->deleteDoador($id);
            return response()->json([
                'success' => true,
                'doador_deletado' => $doador
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
}
