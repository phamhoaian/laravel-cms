<li class="item">
	<h3>{!! $engagement->title !!}</h3>
	<div class="content">
		<a class="engagements-item-link" href="{{ $engagement->website }}" title="{{ $engagement->title }}" target="_blank">
		    {!! $engagement->present()->thumb(null, null) !!}
		</a>
		{!! $engagement->body !!}
	</div>
    
</li>
