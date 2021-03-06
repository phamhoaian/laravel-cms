@extends('core::public.master')

@section('title', $model->title.' – '.__('Galleries').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-galleries body-gallery-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Galleries', 'model' => $model])
    <article class="gallery">
        <h1 class="gallery-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="gallery-summary">{{ nl2br($model->summary) }}</p>
        <div class="gallery-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
