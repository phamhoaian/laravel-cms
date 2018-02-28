@extends('pages::public.master')

@section('site-title')
<h1 class="site-title">@include('core::public._site-title')</h1>
@endsection

@push('css')
    <link href="{{ app()->isLocal() ? asset('css/bannerscollection_zoominout.css') : asset(elixir('css/bannerscollection_zoominout.css')) }}" rel="stylesheet">
    <link href="{{ app()->isLocal() ? asset('css/animate.css') : asset(elixir('css/animate.css')) }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('js/bannerscollection_zoominout.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/scrollspy.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endpush

@section('content')

    {{-- @if($page->image)
        {!! $page->present()->thumb(200, 200) !!}
    @endif --}}

    {!! $page->present()->body !!}

    {{-- @include('files::public._files', ['model' => $page]) --}}


    @if ($slides = Slides::all() and $slides->count())
        @include('slides::public._slider', ['items' => $slides])
    @endif

{{--
    @if ($latestNews = News::latest(3) and $latestNews->count())
        <div class="news-container">
            <h2>@lang('db.Latest news')</h2>
            @include('news::public._list', ['items' => $latestNews])
            <a href="{{ route($lang.'::index-news') }}" class="btn btn-default btn-xs">@lang('db.All news')</a>
        </div>
    @endif
--}}

{{--
    @if ($upcomingEvents = Events::upcoming() and $upcomingEvents->count())
        <div class="events-container">
            <h3>@lang('db.Incoming events')</h3>
            @include('events::public._list', ['items' => $upcomingEvents])
            <a href="{{ route($lang.'::index-events') }}" class="btn btn-default btn-xs">@lang('db.All events')</a>
        </div>
    @endif
--}}

{{--
    @if ($partners = Partners::allBy('homepage', 1) and $partners->count())
        <div class="partners-container">
            <h2><a href="{{ route($lang.'::index-partners') }}">@lang('db.Partners')</a></h2>
            @include('partners::public._list', ['items' => $partners])
        </div>
    @endif
--}}

@endsection
