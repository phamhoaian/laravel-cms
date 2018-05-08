@extends('pages::public.master')

@section('wraperClass', 'half')

@section('page')

	<!-- CONTENT NAV -->
	<nav class="content-nav fixed">
		<ul class="parent">
			<li>
				<span>@lang('db.Careers')</span>
				{!! Menus::render('career') !!}
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
		</div>
	</section>

@endsection