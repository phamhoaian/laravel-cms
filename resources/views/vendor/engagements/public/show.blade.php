@extends('core::public.master')

@section('wraperClass', 'half')
@section('title', $model->title.' – '.__('Engagements').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-engagements body-engagement-'.$model->id.' body-page body-page-'.$page->id)

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
			<article class="engagement">
		        <h1 class="engagement-title">{{ $model->title }}</h1>
		        {!! $model->present()->thumb(null, 200) !!}
		        <p class="engagement-summary">{{ nl2br($model->summary) }}</p>
		        <div class="engagement-body">{!! $model->present()->body !!}</div>
		    </article>
		    @include('core::public._btn-prev-next', ['module' => 'Engagements', 'model' => $model])
    	</div>
	</section>

@endsection
