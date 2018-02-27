@extends('pages::public.master')

@section('wraperClass', 'half')

@section('content')

    @if ($children)
    <ul class="nav nav-subpages">
        @foreach ($children as $child)
        @include('pages::public._list-item', array('child' => $child))
        @endforeach
    </ul>
    @endif

    @if ($page->image)
    <section class="content-header-bg">
        <img src="{!! url($page->present()->thumbSrc()) !!} " alt="" width="1000px">
    </section>
    @endif

    <section class="content">
        <div class="main-content">
            {!! $page->present()->body !!}
        </div>
    </section>
    
    {{-- @include('files::public._files', ['model' => $page]) --}}

    @foreach ($page->publishedSections as $section)
        <div id="{{ $section->position.'-'.$section->slug }}">
        {!! $section->present()->body !!}
        </div>
    @endforeach

@endsection
