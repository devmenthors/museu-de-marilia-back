<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco;
use App\Repositories\Endereco\IEnderecoRepo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class EnderecoRepo implements IEnderecoRepo
{
    public function getAllEnderecos(): Collection
    {
        return Endereco::all();
    }

    public function findEnderecoById(int $id): ?Endereco
    {
        return Endereco::with('pessoas')->find($id);
    }

    public function createEndereco(array $data): Endereco
    {
        return Endereco::create($data);
    }

}