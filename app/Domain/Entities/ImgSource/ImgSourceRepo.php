<?php

namespace App\Domain\Entities\ImgSource;

use App\Domain\Entities\ImgSource\ImgSource;

interface ImgSourceRepo {
    public function getById(string $id): ImgSource;
    public function save(string $id, string $filePath, string $mimeType): void;
    public function getUrl(string $id, string $expiration = '+20 minutes'): string;
}
