<?php

namespace App\Providers;

use App\Articles\ArticlesRepository;
use Illuminate\Support\ServiceProvider;
use App\Articles\EloquentArticlesRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticlesRepository::class, function () {
            return new EloquentArticlesRepository();
        });
    }
}
