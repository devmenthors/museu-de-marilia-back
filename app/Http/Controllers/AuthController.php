<?php

namespace App\Http\Controllers;

use App\Services\FuncionarioService;
use Exception;
use Illuminate\Http\Request;

// TODO: atualizar esse controller para suportar login de doadores*
// * -> caso seja necessário

class FuncionarioAuthController extends Controller
{
    public function __construct(
        private readonly FuncionarioService $funcionarioService
    ) {}

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required', 'string'],
        ]);

        try {
            $auth_info = $this->funcionarioService->authFuncionario($credentials['email'], $credentials['senha']);
            $funcionario = $auth_info["funcionario"];
            return response()->json([
                'access_token' => $auth_info["token"],
                'token_type' => $auth_info["token_type"],
                'funcionario' => [
                    'funcionario_id' => $funcionario->funcionario_id,
                    'nome' => $funcionario->pessoa->nome_pessoa,
                    'email' => $funcionario->pessoa->email,
                ],
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => "ERRO: " . $exception->getMessage()
            ], 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout realizado com sucesso.',
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user()->load('pessoa'));
    }
}
