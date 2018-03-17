<li class="galleries-item">
    <a class="galleries-item-link" href="{{ route($lang.'::gallery', $gallery->slug) }}" title="{{ $gallery->title }}">
        <span class="galleries-item-title">{!! $gallery->title !!}</span>
        <span class="galleries-item-image">{!! $gallery->present()->thumb(null, 200) !!}</span>
    </a>
</li>
