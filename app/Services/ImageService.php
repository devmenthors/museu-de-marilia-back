<?php

namespace App\Services;

use App\Repositories\Img\ImgRepoInterface;

class ImageService
{
    public function __construct(
        private readonly ImgRepoInterface $imageRepository
    ) {}

    /**
     * Retorna a URL assinada do MinIO para a qual a API redirecionará o usuário.
     */
    public function getRedirectUrlForImage(string $id, bool $isPublic): string
    {   
        if ($isPublic) {
            return $this->imageRepository->getPresignedUrl($id);
        }
        return $this->imageRepository->getPresignedUrl($id, '+15 minutes');
    }

    /**
     * Retorna a URL da API (usada, por exemplo, em respostas JSON).
     */
    public function getFormattedImageUrl(string $id): string
    {
        return $this->imageRepository->getApiUrl($id);
    }
}