<?php

namespace App\Repositories\Img;

interface ImgRepoInterface {
    public function getApiUrl(string $id): string;

    public function getPublicUrl(string $id);
    public function getPresignedUrl(string $id, string $expiration = "+20 minutes");

    public function exists(string $id): bool;
    public function existsPrivate(string $id): bool;
}
