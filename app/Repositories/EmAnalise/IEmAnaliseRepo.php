<?php

namespace App\Repositories\EmAnalise;

use App\Models\EmAnalise;

interface IEmAnaliseRepo
{
    public function createEmAnalise(array $data): EmAnalise;

    public function getAllEmAnalises();

    public function findEmAnaliseById(int $id): EmAnalise;
    
    public function updateEmAnalise(int $id, array $data): EmAnalise;

    public function deleteEmAnalise(int $id): EmAnalise;
    
}

