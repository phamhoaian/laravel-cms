@foreach ($galleries as $gallery)
<div class="mo-galleries">
	<div class="mo-gallery-wrap">
		@include('galleries::public._thumbs', ['model' => $gallery])
	</div>
</div>
@endforeach
