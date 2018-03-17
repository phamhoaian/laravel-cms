<?php

namespace TypiCMS\Modules\Galleries\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Galleries\Composers\SidebarViewComposer;
use TypiCMS\Modules\Galleries\Facades\Galleries;
use TypiCMS\Modules\Galleries\Models\Gallery;
use TypiCMS\Modules\Galleries\Repositories\EloquentGallery;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.galleries'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['galleries' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'galleries');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/galleries'),
        ], 'typicms-views');

        AliasLoader::getInstance()->alias('Galleries', Galleries::class);

        // Observers
        Gallery::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('galleries::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('galleries');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Galleries', EloquentGallery::class);
    }
}
