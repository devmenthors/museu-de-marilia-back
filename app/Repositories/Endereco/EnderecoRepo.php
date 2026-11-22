<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco;
use App\Repositories\Endereco\IEnderecoRepo;
use Illuminate\Support\Collection;

class EnderecoRepo implements IEnderecoRepo
{
    public function getAllEnderecos(int $doador_id): Collection
    {
        return Endereco::where('doador_id', $doador_id)->all();
    }

    public function findEnderecoById(int $doador_id, int $id): ?Endereco
    {
        return Endereco::where('doador_id', $doador_id)->find($id);
    }

    public function createEndereco(array $data): Endereco
    {
        return Endereco::create($data);
    }

    public function updateEndereco(int $id, array $data): Endereco
    {
        $endereco = Endereco::findOrFail($id);
        $endereco->update($data);
        return $endereco;
    }

    public function deleteEndereco(int $id, array $data): Endereco
    {
        $endereco = Endereco::with('doador')->findOrFail($id);
        $endereco->delete();
        return $endereco;
    }
}