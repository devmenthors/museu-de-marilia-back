<?php

namespace App\Providers;

use App\Domain\Adapters\MinioStorageAdapter;
use App\Domain\Entities\ImgSource\ImgSourceRepo;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ImgSourceRepo::class, function ($app) {
            return new MinioStorageAdapter(
                storage: $app->make(FilesystemManager::class),
                diskName: "minio"
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
