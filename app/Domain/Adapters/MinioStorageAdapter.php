<?php

namespace App\Domain\Adapters;

use App\Domain\Entities\ImgSource\ImgSourceRepo;
use App\Domain\Entities\ImgSource\ImgSource;
use Illuminate\Contracts\Filesystem\Factory as FilesystemManager;
use Illuminate\Contracts\Filesystem\Filesystem;
use Exception;

class MinioStorageAdapter implements ImgSourceRepo
{
    private Filesystem $disk;

    public function __construct(FilesystemManager $storage, string $diskName = 'minio')
    {
        $this->disk = $storage->disk($diskName);
    }

    public function getById(string $id): ImgSource
    {
        if (!$this->disk->exists($id)) {
            throw new Exception("Imagem não encontrada: {$id}");
        }

        $stream = $this->disk->readStream($id);
        $size = $this->disk->size($id);

        return new ImgSource(
            $id,
            $stream,
            $size
        );
    }

    public function getUrl(string $id, string $expiration = '+20 minutes'): string
    {
        if (!$this->disk->exists($id)) {
            throw new Exception("Imagem não encontrada: {$id}");
        }

        return $this->disk->temporaryUrl(
            $id,
            now()->parse($expiration)
        );
    }

    public function save(string $id, string $filePath, string $mimeType): void
    {
        $stream = fopen($filePath, 'r');

        $this->disk->put($id, $stream, [
            'mimetype' => $mimeType,
        ]);

        if (is_resource($stream)) {
            fclose($stream);
        }
    }
}
