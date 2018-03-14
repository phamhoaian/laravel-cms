@extends('pages::public.master')

@section('site-title')
<h1 class="site-title">@include('core::public._site-title')</h1>
@endsection

@push('css')
    <link href="{{ app()->isLocal() ? asset('css/bannerscollection_zoominout.css') : asset(elixir('css/bannerscollection_zoominout.css')) }}" rel="stylesheet">
    <link href="{{ app()->isLocal() ? asset('css/animate.css') : asset(elixir('css/animate.css')) }}" rel="stylesheet">
    <style type="text/css">
        body {
            width:100%;
            height:100%;
            margin:0;
            padding:0;
            overflow-x:hidden;
        }
    </style>
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

    <section class="mo-parallax">
        <div class="mo-section right">
            <div class="wrapper">
                <svg data-speed="1" role="img" class="section-letter left-top js-parallax">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-company.svg#letter"></use>
                </svg>
                <div class="section-image wow fadeInRight">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="/img/our-roots.jpg" style="width: 1150px;height: auto;">
                        </div>
                    </div>
                </div>
                <div class="section-block wow fadeInUp">
                    @block('company')
                    <a class="block-button" href="company/our-roots.html">
                        <span class="button-label">More...</span>
                    </a>
                </div>
                </div>
        </div>
        <div class="mo-section left">
            <div class="wrapper">
                <svg data-speed="1" role="img" class="section-letter right-top js-parallax">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-career.svg#letter"></use>
                </svg>
                <div class="section-image  wow fadeInLeft">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="/img/why-work-with-us.jpg">
                        </div>
                    </div>
                    <a class="block-button" href="careers/why-work-with-us.html">
                        <span class="button-label">More...</span>
                    </a>
                </div>
                <div class="section-block  wow fadeInUp">
                    @block('career')
                </div>
            </div>
        </div>
        <div class="mo-section">
            <div class="wrapper">
                <svg data-speed="1" role="img" class="section-letter center-top js-parallax">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-business.svg#letter"></use>
                </svg>
                <div class="section-image">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="/img/our-approach.jpg">
                        </div>
                    </div>
                </div>
                <div class="section-block wow fadeInUp">
                    @block('business')
                    <a class="block-button" href="businesses/our-approach.html">
                        <span class="button-label">More...</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="mo-section right">
            <div class="wrapper">
                <svg data-speed="1" role="img" class="section-letter left-top js-parallax">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-news.svg#letter"></use>
                </svg>
                <div class="section-block wow fadeInRight">
                    @block('news')
                        <a class="block-button" href="news/engagement.html">
                            <span class="button-label">More...</span>
                        </a>
                </div>
                <div class="section-image wow fadeInUp">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="/img/vet-seo-cuoc-doi.jpg" style="width: 1150px;height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
