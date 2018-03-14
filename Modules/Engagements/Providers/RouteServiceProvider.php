<?php

namespace TypiCMS\Modules\Engagements\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Engagements\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('engagements')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-engagements');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::engagement');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('engagements', 'AdminController@index')->name('admin::index-engagements')->middleware('can:see-all-engagements');
                $router->get('engagements/create', 'AdminController@create')->name('admin::create-engagement')->middleware('can:create-engagement');
                $router->get('engagements/{engagement}/edit', 'AdminController@edit')->name('admin::edit-engagement')->middleware('can:update-engagement');
                $router->get('engagements/{engagement}/files', 'AdminController@files')->name('admin::edit-engagement-files')->middleware('can:update-engagement');
                $router->post('engagements', 'AdminController@store')->name('admin::store-engagement')->middleware('can:create-engagement');
                $router->put('engagements/{engagement}', 'AdminController@update')->name('admin::update-engagement')->middleware('can:update-engagement');
                $router->patch('engagements/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-engagement-ajax')->middleware('can:update-engagement');
                $router->delete('engagements/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-engagement')->middleware('can:delete-engagement');
            });
        });
    }
}
