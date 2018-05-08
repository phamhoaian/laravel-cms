@extends('pages::public.master')

@section('wraperClass', 'half')

@section('bodyClass', 'body-careers body-careers-index body-page body-page-'.$page->id)

@push('js')
<script type="text/javascript">
	$(function(){
		$('#btn-position-close').on('click', function(){
			$('body').removeClass('is-applied');
			$('#modal-position').slideToggle();
		});

		$('#btn-apply-close').on('click', function(){
			$('body').removeClass('is-applied');
			$('#modal-apply').slideToggle();
		});

		$('#btn-open-position').on('click', function(){
			$('body').addClass('is-applied');
			$('#modal-position').hide();
			$('#modal-apply').slideToggle();
		});
	});

	function open_position() {
		$('body').addClass('is-applied');
		$('#modal-position').slideToggle();
	}
</script>
@endpush

@section('content')

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

    		@includeWhen($models->count() > 0, 'careers::public._position')
    		@includeWhen($models->count() > 0, 'careers::public._apply', ['items' => $models])
		</div>
	</section>

@endsection
