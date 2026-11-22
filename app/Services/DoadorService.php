<?php

namespace App\Services;

use App\Models\Doador;
use App\Repositories\Doador\DoadorRepo;
use App\Repositories\Pessoa\PessoaRepo;
use Illuminate\Support\Facades\DB;

class DoadorService
{
    public function __construct(
        private readonly DoadorRepo $doadorRepo,
        private readonly PessoaRepo $pessoaRepo
    )
    {}

    public function createDoador(array $data): Doador
    {
        return DB::transaction(function () use ($data) {
            $pessoa = $this->pessoaRepo->findPessoaByCpf($data['pessoa']['cpf']);

            if (!$pessoa) {
                $pessoa = $this->pessoaRepo->createPessoa($data['pessoa']);  
            } else {
                $this->pessoaRepo->updatePessoa($pessoa->pessoa_id, $data['pessoa']);
            }

            $doador = $pessoa->doador()->withTrashed()->first(); // se tiver "deletado"

            if ($doador) {
                if (!$doador->trashed()) throw new \Exception("Já existe esse CPF em um doador ativo");

                return $this->doadorRepo->restaurarDoador($doador->doador_id, $data['doador']);
            }
            
            $data['doador']['pessoa_id'] = $pessoa->pessoa_id;

            return $this->doadorRepo->createDoador($data['doador']);
        });
    }

    public function findDoadorById(int $id): ?Doador
    {
        return $this->doadorRepo->findDoadorById($id);
    }

    public function getAllDoadores()
    {
        return $this->doadorRepo->getAllDoadores();
    }

    public function updateDoador(int $id, array $data): Doador
    {
        $doador = $this->doadorRepo->findDoadorById($id);

        if (!$doador) {
            throw new \Exception('Doador não encontrado');
        }

        if(!empty($data['pessoa'])) {
            $this->pessoaRepo->updatePessoa($doador->pessoa_id, $data['pessoa']);
        }

        if (!empty($data['doador'])) {
            $this->doadorRepo->updateDoador($id, $data['doador']);
        }
        return $this->doadorRepo->findDoadorById($id);
    }

    public function deleteDoador(int $id): Doador
    {
        $doador = $this->doadorRepo->findDoadorById($id);

        if (!$doador) {
            throw new \Exception('Doador não encontrado.');
        }

        return $this->doadorRepo->deleteDoador($id);
    }
}