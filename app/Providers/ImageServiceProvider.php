<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register the ImageManager as a singleton
        $this->app->singleton('ImageManager', function () {
            return new ImageManager(['driver' => 'gd']); // or 'imagick'
        });

        // Bind the alias 'Image' to the ImageManager
        $this->app->alias('ImageManager', \Intervention\Image\Facades\Image::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
