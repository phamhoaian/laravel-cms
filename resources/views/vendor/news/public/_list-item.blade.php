<li class="item" itemscope itemtype="http://schema.org/Article">
    <div class="img">
        <a class="item-link" href="{{ route($lang.'::news', $news->slug) }}" itemprop="url">
            {!! $news->present()->thumb(540, 400) !!}
            <meta itemprop="image" content="{{ $news->present()->thumbUrl() }}">
        </a>
    </div>
    <div class="content">
        <a class="item-link" href="{{ route($lang.'::news', $news->slug) }}" itemprop="url">
            <h2 class="item-title" itemprop="name">{{ $news->title }}</h2>
        </a>
        {{-- <div class="item-date-wrapper">@lang('Published on')
            <time class="newslist-item-date" itemprop="datePublished" datetime="{{ $news->date->toIso8601String() }}">{{ $news->present()->dateLocalized }}</time>
        </div> --}}
        <div class="item-summary" itemprop="headline">{{ $news->summary }}</div>
    </div>
</li>
