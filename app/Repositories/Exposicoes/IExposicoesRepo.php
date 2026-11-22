<?php

namespace App\Repositories\Exposicoes;

use App\Models\Exposicao;

interface IExposicoesRepo
{
    public function createExposicao(array $data): Exposicao;

    public function getAllExposicao();

    public function findExposicaoById(int $id): Exposicao;
    
    public function updateExposicao(int $id, array $data): Exposicao;

    public function deleteExposicao(int $id): Exposicao;
    
}

