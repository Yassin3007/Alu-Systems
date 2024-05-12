<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ProjectsService;
class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectsService::class, function ($app) {
        return new ProjectsService();
    });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
