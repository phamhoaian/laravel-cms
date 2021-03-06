<?php

namespace TypiCMS\Modules\News\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\News\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return null
     */
    public function map()
    {
        Route::namespace($this->namespace)->group(function (Router $router) {

            /*
             * Front office routes
             */
            if ($page = TypiCMS::getPageLinkedToModule('news')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-news');
                            $router->get($uri.'.xml', $options + ['uses' => 'PublicController@feed'])->name($lang.'::news-feed');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::news');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('news', 'AdminController@index')->name('admin::index-news')->middleware('can:see-all-news');
                $router->get('news/create', 'AdminController@create')->name('admin::create-news')->middleware('can:create-news');
                $router->get('news/{news}/edit', 'AdminController@edit')->name('admin::edit-news')->middleware('can:update-news');
                $router->get('news/{news}/files', 'AdminController@files')->name('admin::edit-news-files')->middleware('can:update-news');
                $router->post('news', 'AdminController@store')->name('admin::store-news')->middleware('can:create-news');
                $router->put('news/{news}', 'AdminController@update')->name('admin::update-news')->middleware('can:update-news');
                $router->patch('news/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-news-ajax')->middleware('can:update-news');
                $router->delete('news/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-news')->middleware('can:delete-news');
            });
        });
    }
}
