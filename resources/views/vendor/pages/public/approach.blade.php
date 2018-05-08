@extends('pages::public.master')

@section('page')

	<!-- CONTENT NAV -->
	<nav class="content-nav fixed">
		<ul class="parent">
			<li>
				<span>@lang('db.Businesses')</span>
				{!! Menus::render('business') !!}
			</li>
		</ul>
	</nav>
	<!-- END CONTENT NAV -->

	@if ($page->image)
    <section class="content-header-bg black">
		<img src="{!! url($page->present()->thumbSrc()) !!} ">
		<div class="content-text-bg">
			{!! $page->present()->body !!}
		</div>
	</section>
    @endif

@endsection