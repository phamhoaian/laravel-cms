<?php

namespace TypiCMS\Modules\Galleries\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Galleries\Repositories\EloquentGallery;

class PublicController extends BasePublicController
{
    public function __construct(EloquentGallery $gallery)
    {
        parent::__construct($gallery);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('galleries::public.index')
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

        return view('galleries::public.show')
            ->with(compact('model'));
    }
}
