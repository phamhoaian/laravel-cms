@extends('pages::public.master')

@section('wraperClass', 'half')

@section('bodyClass', 'body-galleries body-galleries-index body-page body-page-'.$page->id)

@section('content')

	<!-- CONTENT NAV -->
	<nav class="content-nav fixed">
		<ul class="parent">
			<li>
				<span>@lang('Business')</span>
				{!! Menus::render('business') !!}
			</li>
		</ul>
	</nav>
	<!-- END CONTENT NAV -->

	<section class="content">
		<div class="main-content">
			{!! $page->present()->body !!}

    		@includeWhen($models->count() > 0, 'galleries::public._list', ['items' => $models])
		</div>
	</section>

	<!-- GALLERIES -->
	@include('galleries::public._galleries', ['galleries' => $models])
	<!-- END GALLERIES -->

@endsection
