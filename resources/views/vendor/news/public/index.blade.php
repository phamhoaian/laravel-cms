@extends('pages::public.master')

@section('wraperClass', 'half')

@section('bodyClass', 'body-news body-news-index body-page body-page-'.$page->id)

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

	@if ($page->image)
    <section class="content-header-bg">
		<img src="{!! url($page->present()->thumbSrc()) !!} " alt="" width="1000px">
	</section>
    @endif

	<section class="content">
		<div class="main-content">
			{!! $page->present()->body !!}

			@includeWhen($models->count() > 0, 'news::public._list', ['items' => $models])

    		{!! $models->appends(Request::except('page'))->links() !!}

    		{{-- @include('files::public._files', ['model' => $page]) --}}
		</div>
	</section>

@endsection
