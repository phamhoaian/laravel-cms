<?php

namespace TypiCMS\Modules\Careers\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Careers\Models\Career;

class EloquentCareer extends EloquentRepository
{
    protected $repositoryId = 'careers';

    protected $model = Career::class;
}
