<?php

namespace Labs\Articles;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ArticlesServiceProvider extends ServiceProvider
{
	/**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('article', function ($app) {
            return new Article();
        });
    }

    protected function registerRoutes()
    {
        Router::macro('articles', function(){
            require __DIR__.'/../routes/routes.php';
        });
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'articles');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/articles'),
        ]);
    }
}