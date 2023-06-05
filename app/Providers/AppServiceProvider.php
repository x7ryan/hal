<?php

namespace App\Providers;

use App\Services\Chat\ChatGPT;
use App\Services\Chat\ChatInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChatInterface::class, function () {
            return new ChatGPT;
        });
    }
}
