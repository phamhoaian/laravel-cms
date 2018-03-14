<?php

namespace TypiCMS\Modules\Engagements\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Engagements\Models\Engagement;

class EloquentEngagement extends EloquentRepository
{
    protected $repositoryId = 'engagements';

    protected $model = Engagement::class;
}
