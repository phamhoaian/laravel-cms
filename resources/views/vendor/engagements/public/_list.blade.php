<ul class="news-list">
    @foreach ($items as $engagement)
    @include('engagements::public._list-item')
    @endforeach
</ul>
