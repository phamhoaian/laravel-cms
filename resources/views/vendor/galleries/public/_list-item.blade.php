<li class="gallery">
    {{-- <a href="{{ route($lang.'.galleries.slug', $gallery->slug) }}" class="mo-brand-logo"> --}}
    <a href="javascript:void(0)" class="mo-brand-logo">
        @if ($gallery->image)
			<img src="{!! url($gallery->present()->thumbSrc()) !!}" alt="{{ $gallery->title }}">
        @endif
    </a>
    <div class="mo-branch-info">
        <div class="title">{{ $gallery->title }}</div>
        <div class="summary">{{ $gallery->summary }}</div>
    </div>
</li>
