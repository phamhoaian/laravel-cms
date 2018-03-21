<?php

namespace TypiCMS\Modules\Careers\Facades;

use Illuminate\Support\Facades\Facade;

class Careers extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Careers';
    }
}
