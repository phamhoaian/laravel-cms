<?php

namespace TypiCMS\Modules\Careers\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Careers\Repositories\EloquentCareer;

class PublicController extends BasePublicController
{
    public function __construct(EloquentCareer $career)
    {
        parent::__construct($career);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('careers::public.index')
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

        return view('careers::public.show')
            ->with(compact('model'));
    }
}
