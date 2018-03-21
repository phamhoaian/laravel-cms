<?php

namespace TypiCMS\Modules\Careers\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Careers\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('careers')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-careers');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::career');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('careers', 'AdminController@index')->name('admin::index-careers')->middleware('can:see-all-careers');
                $router->get('careers/create', 'AdminController@create')->name('admin::create-career')->middleware('can:create-career');
                $router->get('careers/{career}/edit', 'AdminController@edit')->name('admin::edit-career')->middleware('can:update-career');
                $router->get('careers/{career}/files', 'AdminController@files')->name('admin::edit-career-files')->middleware('can:update-career');
                $router->post('careers', 'AdminController@store')->name('admin::store-career')->middleware('can:create-career');
                $router->put('careers/{career}', 'AdminController@update')->name('admin::update-career')->middleware('can:update-career');
                $router->patch('careers/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-career-ajax')->middleware('can:update-career');
                $router->delete('careers/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-career')->middleware('can:delete-career');
            });
        });
    }
}
