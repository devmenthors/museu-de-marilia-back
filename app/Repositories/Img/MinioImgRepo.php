<?php

namespace App\Repositories\Img;
use App\Repositories\Img\ImgRepoInterface;
use Illuminate\Support\Facades\Storage;
use Exception;
use Override;

class MinioImgRepo implements ImgRepoInterface {
    private string $disk = "minio_public";
    private string $private_disk = "minio_private";

    public function getUrl(string $id, bool $isPrivate, string $expiration = '+20 minutes') : string
    {
        if ($isPrivate) {
            return $this->getPresignedUrl($id, $expiration);
        }
        return $this->getPublicUrl($id);
    } 

    public function getApiUrl(string $id): string
    {
        return url("/data/img/{$id}");
    }

    #[Override]
    public function getPublicUrl(string $id)
    {
        if (!$this->exists($id)) {
            throw new Exception("Imagem não encontrada no bucket: {$id}");
        }
        return Storage::disk($this->disk)->url(
            $id
        );
    }

    public function getPresignedUrl(string $id, string $expiration = '+20 minutes'): string
    {
        if (!$this->existsPrivate($id)) {
            throw new Exception("Imagem não encontrada no bucket: {$id}");
        }

        return Storage::disk($this->private_disk)->temporaryUrl(
            $id,
            now()->parse($expiration)
        );
    }

    public function exists(string $id): bool
    {
        return Storage::disk($this->disk)->exists($id);
    }

    public function existsPrivate(string $id): bool
    {
        return Storage::disk($this->private_disk)->exists($id);
    }


    public function store(object $file, bool $isPrivate): array
    {   
        $disk = $isPrivate ? $this->private_disk : $this->disk;
        $path = $file->store("/", $disk);

        $url = $this->getUrl($path, $isPrivate);

        return [
            'path' => $path,
            'url' => $url,
            'is_private' => $isPrivate,
            'disk' => $disk,
        ];
    }
}
