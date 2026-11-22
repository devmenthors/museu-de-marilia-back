<?php

namespace App\Http\Controllers;

use App\Services\ReservaTecnicaService;
use Illuminate\Http\Request;

class ReservaTecnicaController extends Controller
{
    public function __construct(
        private readonly ReservaTecnicaService $reservaTecnicaService
    )
    {}

    public function createReservaTecnica(Request $request) 
    {
        $validatedData = $request->validate([
            'justificativa_reserva' => ['required', 'string'],
            'prateleira' => ['required', 'string'],
            'ficha_doacao_id' => ['required', 'integer']
            /* da pra passar via session ou fazer uma busca e passar pela página anterior
            ou até msm usando o protocolo */
        ]);

        try {
            $reserva_criada = $this->reservaTecnicaService->createReservaTecnica($validatedData);

            return response()->json([
                'success' => true,
                'reserva_criada' => $reserva_criada
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function updateReservaTecnica(int $id, Request $request) 
    {
        $validatedData = $request->validate([
            'justificativa_reserva' => 'string',
            'prateleira' => 'string',
        ]); // ficha_doacao_id nao é mutável
        
        try {
            $updatedReserva = $this->reservaTecnicaService->updateReservaTecnica($id, $validatedData);

            return response()->json([
                'success' => true,
                'updated_reserva' => $updatedReserva
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }

    public function deleteReservaTecnica(int $id) 
    { // dnv, se pa nem precisa
        try {
            $reserva = $this->reservaTecnicaService->deleteReservaTecnica($id);

            return response()->json([
                'success' => true,
                'reserva_deletada' => $reserva
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function getAllReservasTecnica() 
    {
        try {
            $reservas = $this->reservaTecnicaService->getAllReservasTecnica();

            return response()->json([
                'success' => true,
                'reservas_tecnica' => $reservas
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 400);
        }
    }
    
    public function findReservaTecnicaById(int $id) 
    {
        try {
            $reserva = $this->reservaTecnicaService->findReservaTecnicaById($id);

            return response()->json([
                'success' => true,
                'reserva' => $reserva
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ], 404);
        }
    }
}
