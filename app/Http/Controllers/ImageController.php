<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class ImageController extends Controller
{
    public function __construct(
        private readonly ImageService $imageService
    ) {}

    public function showPrivate(string $id ): RedirectResponse | JsonResponse
    {
        return $this->show($id, false);
    }

    public function show(string $id, bool $isPublic = true): RedirectResponse | JsonResponse
    {
        try {
            $presignedUrl = $this->imageService->getRedirectUrlForImage($id, $isPublic);
            return redirect()->away($presignedUrl);

        } catch (Exception $e) {
            // dd($e->getMessage(), $e->getPrevious()?->getMessage());
            return response()->json([
                'success' => false,
                // 'error' => $e->getMessage()
                'message' => "Imagem não encontrada: {$id}"
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'      => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5120', // Máximo 5MB
            'is_private' => 'nullable|boolean',
        ]);

        try {
            $isPrivate = $request->boolean('is_private', false);
            $data = $this->imageService->store($request->file("image"), $isPrivate);
            return response()->json([
                "message" => "Uploaded image successfully",
                "url" => $data["url"],
                "path" => $data["path"]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => "Erro: " . $e->getMessage()
            ], 400);
        }
    }
}
