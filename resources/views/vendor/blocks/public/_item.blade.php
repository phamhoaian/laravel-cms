@section('letter')

@endsection

<div class="mo-section">
	<div class="wrapper">
		<svg data-speed="1" role="img" class="section-letter {!! $options['direction'] ? $options['direction'] : '' !!} js-parallax">
			<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/img/letter-{!! $options['name'] !!}.svg#letter"></use>
		</svg>
		<div class="section-image wow fadeInRight">
			<div class="section-image-wrapper">
				<div class="section-image-bg">
					<img src="{!! $options['image'] !!}" style="width: 1150px;height: auto;">
				</div>
			</div>
		</div>
		<div class="section-block wow fadeInUp">
			{!! $block ? $block->present()->body : '' !!}
			<a class="block-button" href="{!! $options['url'] ? $options['url'] : '' !!}">
				<span class="button-label">More...</span>
			</a>
		</div>
		</div>
</div>
