<?php

namespace App\Http\Controllers;

use App\Services\FichaDoacaoService;
use Illuminate\Http\Request;

class FichaDoacaoController extends Controller
{
    public function __construct(
        private readonly FichaDoacaoService $fichaDoacaoService
    )
    {}

    public function createFichaDoacao(Request $request)
    {

        // colocar lógica pegar Auth::id() p funcionario_id
        // doador_id pd vir de um findByCpf
        $dataValidado = $request->validate([
            'doador_id' => ['required', 'string'], // chega como cpf dps vira id no service
        
            'nome_acervo' => ['required', 'string'],
            'categoria_acervo' => ['required', 'string'],
            'estado_conservacao' => 'string',

            'qnt_itens' => 'integer',

            'dt_incorporacao' => ['nullable', 'date'],
            'dt_recebimento' => ['nullable', 'date'],
            'confirmado_em' => ['nullable', 'date'],
            
            'cor' => ['nullable', 'string'],
            'largura' => ['nullable', 'decimal:1,2'],
            'altura' => ['nullable', 'decimal:1,2'],

            'descricao' => ['nullable', 'string', 'max:50000']
        ]);

        $dataValidado['funcionario_id'] = 1; //Auth::id()
        
        $fichaCriada = $this->fichaDoacaoService->createFichaDoacao($dataValidado);
        
        if ($fichaCriada) {
            return response()->json([
                'success' => true,
                'criado' => "Ficha atualizada com sucesso!"
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
    
    public function updateFichaDoacao(int $id, Request $request) {
        $dataValidado = $request->validate([
            'funcionario_id' => 'integer',
            'doador_id' => 'integer',
        
            'categoria_acervo' => 'string',
            'estado_conservacao' => 'string',
            'status_atual' => 'string',

            'qnt_itens' => 'integer',

            'dt_incorporacao' => 'date',
            'dt_recebimento' => 'date',
            'confirmado_em' => 'date',
            
            'cor' => 'string',
            'largura' => 'decimal:1,2',
            'altura' => 'decimal:1,2',

            'descricao' => ['string', 'max:50000']
        ]);

        $fichaAtualizada = $this->fichaDoacaoService->updateFichaDoacao($id, $dataValidado);

        if ($fichaAtualizada) {
            return response()->json([
                'success' => true,
                'criado' => $fichaAtualizada
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function findFichaDoacaoById(int $id) 
    {
        try {
            $fichaDoacao = $this->fichaDoacaoService->findFichaDoacaoById($id);

            return response()->json([
                'success' => true,
                'fichaRegistro' => $fichaDoacao
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage(),
                'line' => $e->getFile() . ':' . $e->getLine()
            ], 500);
        }
    }

    public function getAllFichas()
    {
        return response()->json([
            'success' => true,
            'fichasRegistro' => $this->fichaDoacaoService->getAllFichas()
        ]);
    }

    public function deleteFichaDoacao(int $id) {
        try {
            $fichaDeletada = $this->fichaDoacaoService->deleteFichaDoacao($id);

            return response()->json([
                'success' => true,
                'ficha_deletada' => $fichaDeletada
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $e->getMessage()
            ]);
        }
    }
}
