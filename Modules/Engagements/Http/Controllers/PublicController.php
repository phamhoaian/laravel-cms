<?php

namespace TypiCMS\Modules\Engagements\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Engagements\Repositories\EloquentEngagement;

class PublicController extends BasePublicController
{
    public function __construct(EloquentEngagement $engagement)
    {
        parent::__construct($engagement);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('engagements::public.index')
            ->with(compact('models'));
    }

    /**
     * Show resource.
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $model = $this->repository->bySlug($slug);

        return view('engagements::public.show')
            ->with(compact('model'));
    }
}
