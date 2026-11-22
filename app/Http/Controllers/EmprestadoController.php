<?php

namespace App\Http\Controllers;

use App\Services\EncaminhadoService;
use Illuminate\Http\Request;

class EmprestadoController extends Controller
{
    public function __construct(
        private readonly EncaminhadoService $encaminhadoService
    )
    {}

    public function createEmprestado(Request $request) 
    {
        $validatedData = $request->validate([
            'dt_encaminhado' => ['required', 'date'],
            'instituicao' => ['required', 'string'],
            'justificativa_encaminhado' => ['required', 'string'],
            'ficha_doacao_id' => ['required', 'integer']
        ]);

        try {
            $emprestado = $this->encaminhadoService->createEncaminhado($validatedData);

            return response()->json([
                'success' => true,
                'emprestado_criado' => $emprestado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function updateEmprestado(int $id, Request $request) 
    {
        $validatedData = $request->validate([
            'dt_encaminhado' => 'date',
            'instituicao' => 'string',
            'justificativa_encaminhado' => 'string',
            'ficha_doacao_id' => 'integer'
        ]);
        
        try {
            $emprestado = $this->encaminhadoService->updateEncaminhado($id, $validatedData);

            return response()->json([
                'success' => true,
                'emprestado_atualizado' => $emprestado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function deleteEmprestado(int $id) 
    { // dnv, se pa nem precisa
        try {
            $emprestado = $this->encaminhadoService->deleteEncaminhado($id);
            
            return response()->json([
                'success' => true,
                'encaminhado_deletado' => $emprestado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function getAllEmprestados() 
    {
        try {
            $emprestados = $this->encaminhadoService->getAllEncaminhado();

            return response()->json([
                'success' => true,
                'emprestados' => $emprestados
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function findEmprestadoById(int $id) 
    {
        try {
            $emprestado = $this->encaminhadoService->findEncaminhadoById($id);

            return response()->json([
                'success' => true,
                'emprestado' => $emprestado
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 404);
        }
    }
}
