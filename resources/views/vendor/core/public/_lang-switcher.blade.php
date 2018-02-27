@if ($enabledLocales = TypiCMS::enabledLocales() and count($enabledLocales) > 1)
<ul class="mo-nav-lang" role="menu">
    @foreach ($enabledLocales as $locale)
    <li class="@if($locale == config('app.locale'))active @endif" role="menuitem">
        @if (isset($model) and isset($page))
                @if ($model->category and $model->translate('status', $locale))
                    <a class="lang-switcher-link" href="{{ url($page->uri($locale).'/'.$model->category->translate('slug', $locale).'/'.$model->translate('slug', $locale)) }}">{{ $locale }}</a>
                @elseif ($model->translate('status', $locale))
                    <a class="lang-switcher-link" href="{{ url($page->uri($locale).'/'.$model->translate('slug', $locale)) }}">{{ $locale }}</a>
                @else
                    <a class="lang-switcher-link" href="{{ url($page->uri($locale)) }}">{{ $locale }}</a>
                @endif
        @elseif (isset($page) && Route::current()->hasParameter('category'))
        <a class="lang-switcher-link" href="{{ url($page->uri($locale).'/'.$category->translate('slug', $locale)) }}">{{ $locale }}</a>
        @elseif (isset($page))
        <a class="lang-switcher-link" href="{{ url($page->uri($locale)) }}">{{ $locale }}</a>
        @else
        <a class="lang-switcher-link" href="{{ url('/') }}">{{ $locale }}</a>
        @endif
    </li>
    @endforeach
</ul>
@endif
