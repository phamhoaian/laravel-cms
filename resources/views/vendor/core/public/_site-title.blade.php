<a class="mo-logo" href="{{ TypiCMS::homeUrl() }}">
    <div class="mo-logo-wrap">
        <div class="mo-logo-wrapper">
            <h1>
            	@if (TypiCMS::hasLogo())
                	<img src="{{ url('storage/settings/'.config('typicms.image')) }}" alt="{{ TypiCMS::title() }}">
            	@else
			        {{ TypiCMS::title() }}
			    @endif
            </h1>
        </div>
    </div>
</a>