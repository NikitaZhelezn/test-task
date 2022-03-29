<?php

namespace App\Providers;

use App\Services\FileStorage;
use App\Services\PdfService;
use App\Services\PdfUploaderService;
use App\Services\ShortLinkContract;
use App\Services\ShortLinkService;
use Hashids\Hashids;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(ShortLinkContract::class, function ($app) {
            return new ShortLinkService(new Hashids('', 8));
        });
        $this->app->bind(PdfUploaderService::class, function ($app) {
            return new PdfUploaderService(new PdfService(), new FileStorage());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
