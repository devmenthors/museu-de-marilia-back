<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Exception;

class ImageController extends Controller
{
    public function __construct(
        private readonly ImageService $imageService
    ) {}

    public function show(string $id): RedirectResponse | JsonResponse
    {
        try {
            $presignedUrl = $this->imageService->getRedirectUrlForImage($id);

            return redirect()->away($presignedUrl);
        } catch (Exception $e) {
            dd($e->getMessage(), $e->getPrevious()?->getMessage());
            // return response()->json([
            //     'error' => $e->getMessage()
            //     // 'error' => "Imagem não encontrada: {$id}"
            // ], 404);
        }
    }
}
