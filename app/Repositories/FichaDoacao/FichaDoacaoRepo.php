<?php

namespace App\Repositories\FichaDoacao;

use App\Models\FichaDoacao;
use App\Repositories\FichaDoacao\IFichaDoacaoRepo;

class FichaDoacaoRepo implements IFichaDoacaoRepo
{
    public function createFichaDoacao(array $data): FichaDoacao
    {
        return FichaDoacao::create($data);
    }

    public function findFichaDoacaoById(int $id): ?FichaDoacao
    {
        return FichaDoacao::query()->where('ficha_doacao_id', $id)->first();
    }

    public function updateFichaDoacao(int $id, array $data): int
    {
        return FichaDoacao::query()->where('ficha_doacao_id', $id)->update($data);
    }

    public function deleteFichaDoacao(int $id): ?FichaDoacao
    {
        $ficha = FichaDoacao::query()->find($id);
        $ficha->delete();

        return $ficha;
    }

    public function getAllFichas()
    {
        return FichaDoacao::query()->get()->all();
    }
}