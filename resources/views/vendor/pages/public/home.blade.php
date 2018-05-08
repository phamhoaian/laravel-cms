@extends('pages::public.master')

@section('site-title')
<h1 class="site-title">@include('core::public._site-title')</h1>
@endsection

@push('css')
    <link href="{{ asset('css/bannerscollection_zoominout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
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
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-company-{{ config('app.locale') }}.svg#letter"></use>
                </svg>
                <div class="section-image wow fadeInRight">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="{{ asset('img/our-roots.jpg') }}" style="width: 1150px;height: auto;">
                        </div>
                    </div>
                </div>
                <div class="section-block wow fadeInUp">
                    @block('company')
                    <a class="block-button" href="{{ config('app.locale') == 'en' ? 'en/our-roots' : 'vi/lich-su-cong-ty' }}">
                        <span class="button-label">@lang('db.More')</span>
                    </a>
                </div>
                </div>
        </div>
        <div class="mo-section left">
            <div class="wrapper">
                <svg data-speed="1" role="img" class="section-letter right-top js-parallax">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-career-{{ config('app.locale') }}.svg#letter"></use>
                </svg>
                <div class="section-image  wow fadeInLeft">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="{{ asset('img/why-work-with-us.jpg') }}">
                        </div>
                    </div>
                    <a class="block-button" href="{{ config('app.locale') == 'en' ? 'en/why-work-with-us' : 'vi/tai-sao-chon-chung-toi' }}">
                        <span class="button-label">@lang('db.More')</span>
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
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-business-{{ config('app.locale') }}.svg#letter"></use>
                </svg>
                <div class="section-image">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="{{ asset('img/our-approach.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="section-block wow fadeInUp">
                    @block('business')
                    <a class="block-button" href="{{ config('app.locale') == 'en' ? 'en/our-approach' : 'vi/cach-tiep-can' }}">
                        <span class="button-label">@lang('db.More')</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="mo-section right">
            <div class="wrapper">
                <svg data-speed="1" role="img" class="section-letter left-top js-parallax">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-news-{{ config('app.locale') }}.svg#letter"></use>
                </svg>
                <div class="section-block wow fadeInRight">
                    @block('news')
                        <a class="block-button" href="{{ config('app.locale') == 'en' ? 'en/engagement  ' : 'vi/tuong-tac' }}">
                            <span class="button-label">@lang('db.More')</span>
                        </a>
                </div>
                <div class="section-image wow fadeInUp">
                    <div class="section-image-wrapper">
                        <div class="section-image-bg">
                            <img src="{{ asset('img/vet-seo-cuoc-doi.jpg') }}" style="width: 1150px;height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
