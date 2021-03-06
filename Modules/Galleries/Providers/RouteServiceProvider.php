<?php

namespace TypiCMS\Modules\Galleries\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Galleries\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('galleries')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-galleries');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::gallery');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('galleries', 'AdminController@index')->name('admin::index-galleries')->middleware('can:see-all-galleries');
                $router->get('galleries/create', 'AdminController@create')->name('admin::create-gallery')->middleware('can:create-gallery');
                $router->get('galleries/{gallery}/edit', 'AdminController@edit')->name('admin::edit-gallery')->middleware('can:update-gallery');
                $router->get('galleries/{gallery}/files', 'AdminController@files')->name('admin::edit-gallery-files')->middleware('can:update-gallery');
                $router->post('galleries', 'AdminController@store')->name('admin::store-gallery')->middleware('can:create-gallery');
                $router->put('galleries/{gallery}', 'AdminController@update')->name('admin::update-gallery')->middleware('can:update-gallery');
                $router->patch('galleries/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-gallery-ajax')->middleware('can:update-gallery');
                $router->delete('galleries/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-gallery')->middleware('can:delete-gallery');
            });
        });
    }
}
