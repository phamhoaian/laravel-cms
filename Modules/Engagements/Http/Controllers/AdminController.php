<?php

namespace TypiCMS\Modules\Engagements\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Engagements\Http\Requests\FormRequest;
use TypiCMS\Modules\Engagements\Models\Engagement;
use TypiCMS\Modules\Engagements\Repositories\EloquentEngagement;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentEngagement $engagement)
    {
        parent::__construct($engagement);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->with('files')->findAll();
        app('JavaScript')->put('models', $models);

        return view('engagements::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();
        app('JavaScript')->put('model', $model);

        return view('engagements::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Engagements\Models\Engagement $engagement
     *
     * @return \Illuminate\View\View
     */
    public function edit(Engagement $engagement)
    {
        app('JavaScript')->put('model', $engagement);

        return view('engagements::admin.edit')
            ->with(['model' => $engagement]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Engagements\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $engagement = $this->repository->create($request->all());

        return $this->redirect($request, $engagement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Engagements\Models\Engagement             $engagement
     * @param \TypiCMS\Modules\Engagements\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Engagement $engagement, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $engagement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Engagements\Models\Engagement $engagement
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Engagement $engagement)
    {
        $deleted = $this->repository->delete($engagement);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function files(Engagement $engagement)
    {
        $data = [
            'models' => $engagement->files,
        ];

        return response()->json($data, 200);
    }
}
