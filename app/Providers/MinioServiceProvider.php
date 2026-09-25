<?php

namespace App\Providers;

use App\Repositories\Img\ImgRepoInterface;
use App\Repositories\Img\MinioImgRepo;
use Illuminate\Support\ServiceProvider;

class MinioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ImgRepoInterface::class,
            MinioImgRepo::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
