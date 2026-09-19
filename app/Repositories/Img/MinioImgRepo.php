<?php

namespace App\Repositories\Img;
use App\Repositories\Img\ImgRepoInterface;
use Illuminate\Support\Facades\Storage;
use Exception;

class MinioImgRepo implements ImgRepoInterface {
    private string $disk = "minio";

    public function getApiUrl(string $id): string
    {
        return url("/data/img/{$id}");
    }

    public function getPresignedUrl(string $id, string $expiration = '+20 minutes'): string
    {
        if (!$this->exists($id)) {
            throw new Exception("Imagem não encontrada no bucket: {$id}");
        }

        return Storage::disk($this->disk)->temporaryUrl(
            $id,
            now()->parse($expiration)
        );
    }

    public function exists(string $id): bool
    {
        return Storage::disk($this->disk)->exists($id);
    }
}