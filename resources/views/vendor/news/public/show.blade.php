@extends('core::public.master')

@section('wraperClass', 'half')

@section('title', $model->title.' – '.__('News').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-news body-news-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    <!-- CONTENT NAV -->
    <nav class="content-nav fixed">
        <ul class="parent">
            <li>
                <span>@lang('News')</span>
                {!! Menus::render('news') !!}
            </li>
        </ul>
    </nav>
    <!-- END CONTENT NAV -->

    <section class="content">
        <div class="main-content">

            <article class="news" itemscope itemtype="http://schema.org/Article">
                <h1 class="news-title" itemprop="name">{{ $model->title }}</h1>
                {!! $model->present()->thumb(null, null) !!}
                <meta itemprop="image" content="{{ $model->present()->thumbUrl() }}">
                {{-- <div class="news-date-wrapper" class="date">@lang('Published on')
                    <time class="news-date" itemprop="datePublished" datetime="{{ $model->date->toIso8601String() }}">{{ $model->present()->dateLocalized }}</time>
                </div> --}}
                <p class="news-summary" itemprop="headline">{{ nl2br($model->summary) }}</p>
                <div class="news-body" itemprop="articleBody">{!! $model->present()->body !!}</div>
            </article>

            @include('core::public._btn-prev-next', ['module' => 'News', 'model' => $model])

            {{-- @include('files::public._files', ['model' => $page]) --}}
        </div>
    </section>

@endsection
