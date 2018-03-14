@extends('core::admin.master')

@section('title', $model->present()->title)

@section('content')

    @include('core::admin._button-back', ['module' => 'engagements'])
    <h1 class="@if (!$model->present()->title)text-muted @endif">
        {{ $model->present()->title ?: __('Untitled') }}
    </h1>

    {!! BootForm::open()->put()->action(route('admin::update-engagement', $model->id))->multipart()->role('form') !!}
    {!! BootForm::bind($model) !!}
        @include('engagements::admin._form')
    {!! BootForm::close() !!}

@endsection
