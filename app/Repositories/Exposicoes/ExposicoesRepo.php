<?php

namespace App\Repositories\Exposicoes;

use App\Models\Exposicao;
use App\Repositories\Exposicoes\IExposicoesRepo;

class ExposicoesRepo implements IExposicoesRepo
{
    public function createExposicao(array $data): Exposicao
    {
        return Exposicao::query()->create($data);
    }

    public function updateExposicao(int $id, array $data): Exposicao
    {
        $exposicao = Exposicao::query()->findOrFail($id);
        $exposicao->update($data);

        return $exposicao;
    }

    public function deleteExposicao(int $id): Exposicao
    {
        $exposicao = Exposicao::query()->findOrFail($id);
        $exposicao->delete();

        return $exposicao;
    }

    public function getAllExposicao()
    {
        return Exposicao::query()->get()->all();
    }

    public function findExposicaoById(int $id): Exposicao
    {
        return Exposicao::query()->find($id);
    }
}