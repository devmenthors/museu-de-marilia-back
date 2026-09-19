<?php

namespace App\Http\Controllers;

use App\Domain\Entities\ImgSource\ImgSourceRepo;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ImageController extends Controller {
    public function __construct(
        private ImgSourceRepo $storage
    ) {}

    public function show(string $id): RedirectResponse|Response
    {
        try {
            $presignedUrl = $this->storage->getUrl($id, '+5 minutes');
            return redirect()->away($presignedUrl);

        } catch (\Exception $e) {
            return response('Imagem não encontrada.', 404);
        }
    }
}
