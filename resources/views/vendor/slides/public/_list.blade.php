<ul class="bannerscollection_zoominout_list">
    @foreach ($items as $slide)
    @include('slides::public._list-item')
    @endforeach
</ul>
<div class="swiper-pagination"></div>
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
