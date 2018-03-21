@extends('core::public.master')

@section('title', $model->title.' – '.__('Careers').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-careers body-career-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Careers', 'model' => $model])
    <article class="career">
        <h1 class="career-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="career-summary">{{ nl2br($model->summary) }}</p>
        <div class="career-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
