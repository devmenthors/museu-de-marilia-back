<?php

namespace App\Services;

use App\Models\Funcionario;
use App\Repositories\Doador\IDoadorRepo;
use App\Repositories\Funcionario\IFuncionarioRepo;
use App\Repositories\Pessoa\IPessoaRepo;
use Illuminate\Support\Facades\DB;

class FuncionarioService
{

    public function __construct(
        private readonly IFuncionarioRepo $funcionarioRepo,
        private readonly IPessoaRepo $pessoaRepo
    )
    {}

    public function createFuncionario(array $data): Funcionario
    {

        return DB::transaction(function () use ($data) { 
            // se pessoa já existe não cria
            $pessoa = $this->pessoaRepo->findPessoaByCpf($data['pessoa']['cpf']);

            if (!$pessoa) {
                $pessoa = $this->pessoaRepo->createPessoa($data['pessoa']);  
            } else {
                $this->pessoaRepo->updatePessoa($pessoa->pessoa_id, $data['pessoa']);
            }

            $funcionario = $pessoa->funcionario()->withTrashed()->first(); // se tiver "deletado"

            if ($funcionario) {

                if (!$funcionario->trashed()) throw new \Exception("Já existe esse CPF em um funcionário ativo");

                return $this->funcionarioRepo->restaurarFuncionario($funcionario->funcionario_id, $data['funcionario']);
            }

            $data['funcionario']['pessoa_id'] = $pessoa->pessoa_id;

            return $this->funcionarioRepo->createFuncionario($data['funcionario']);
        });
    }

    public function findFuncionarioById(int $id): ?Funcionario
    {
        return $this->funcionarioRepo->findFuncionarioById($id);
    }

    public function getAllFuncionarios()
    {
        return $this->funcionarioRepo->getAllFuncionarios();
    }

    public function updateFuncionario(int $id, array $data): Funcionario // redefinir senha ou coisa assim
    {
        $funcionario = $this->funcionarioRepo->findFuncionarioById($id);

        if (!$funcionario) {
            throw new \Exception('Funcionário não encontrado.');
        }

        if (!empty($data['pessoa'])) {
            $this->pessoaRepo->updatePessoa($funcionario->pessoa_id, $data['pessoa']);
        }
    
        if (!empty($data['funcionario'])) {
            $this->funcionarioRepo->updateFuncionario($id, $data['funcionario']); 
        }
        
        return $this->funcionarioRepo->findFuncionarioById($id);
    }

    public function deleteFuncionario(int $id): Funcionario
    {
        $funcionario = $this->funcionarioRepo->findFuncionarioById($id);
        
        if (!$funcionario) {
            throw new \Exception('Funcionário não encontrado.');
        }

        return $this->funcionarioRepo->deleteFuncionario($id);
    }
}
