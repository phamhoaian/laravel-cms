<?php

namespace TypiCMS\Modules\Engagements\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Engagements\Composers\SidebarViewComposer;
use TypiCMS\Modules\Engagements\Facades\Engagements;
use TypiCMS\Modules\Engagements\Models\Engagement;
use TypiCMS\Modules\Engagements\Repositories\EloquentEngagement;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.engagements'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['engagements' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'engagements');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/engagements'),
        ], 'typicms-views');

        AliasLoader::getInstance()->alias('Engagements', Engagements::class);

        // Observers
        Engagement::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('engagements::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('engagements');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Engagements', EloquentEngagement::class);
    }
}
