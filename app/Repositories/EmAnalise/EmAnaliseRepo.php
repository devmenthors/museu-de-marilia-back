<?php

namespace App\Repositories\EmAnalise;

use App\Models\EmAnalise;
use App\Repositories\EmAnalise\IEmAnaliseRepo;
use Override;

class EmAnaliseRepo implements IEmAnaliseRepo
{
    public function createEmAnalise(array $data): EmAnalise
    {
        return EmAnalise::query()->create($data);
    }

    public function updateEmAnalise(int $id, array $data): EmAnalise
    {
        $emAnalise = EmAnalise::query()->find($id);
        $emAnalise->update($data);

        return $emAnalise;
    }

    public function deleteEmAnalise(int $id): EmAnalise
    {
        $emAnalise = EmAnalise::query()->find($id);
        $emAnalise->delete();

        return $emAnalise;
    }

    public function getAllEmAnalises()
    {
        return EmAnalise::query()->get()->all();
    }

    public function findEmAnaliseById(int $id): EmAnalise
    {
        return EmAnalise::query()->find($id);
    }
}