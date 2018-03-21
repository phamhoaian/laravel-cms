<?php

namespace TypiCMS\Modules\Careers\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Careers\Http\Requests\FormRequest;
use TypiCMS\Modules\Careers\Models\Career;
use TypiCMS\Modules\Careers\Repositories\EloquentCareer;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentCareer $career)
    {
        parent::__construct($career);
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

        return view('careers::admin.index');
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

        return view('careers::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Careers\Models\Career $career
     *
     * @return \Illuminate\View\View
     */
    public function edit(Career $career)
    {
        app('JavaScript')->put('model', $career);

        return view('careers::admin.edit')
            ->with(['model' => $career]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Careers\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $career = $this->repository->create($request->all());

        return $this->redirect($request, $career);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Careers\Models\Career             $career
     * @param \TypiCMS\Modules\Careers\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Career $career, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $career);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Careers\Models\Career $career
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Career $career)
    {
        $deleted = $this->repository->delete($career);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function files(Career $career)
    {
        $data = [
            'models' => $career->files,
        ];

        return response()->json($data, 200);
    }
}
