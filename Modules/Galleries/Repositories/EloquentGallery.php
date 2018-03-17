<?php

namespace TypiCMS\Modules\Galleries\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Galleries\Models\Gallery;

class EloquentGallery extends EloquentRepository
{
    protected $repositoryId = 'galleries';

    protected $model = Gallery::class;
}
