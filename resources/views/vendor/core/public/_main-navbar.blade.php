<!-- HEADER -->
<header class="mo-header">
    <div class="mo-header-button"></div>
    @include('core::public._site-title')
</header>
<button class="mo-nav-button">
    <div class="mo-nav-button-wrap">
        <div class="mo-nav-button-icon">
            <span class="mo-nav-button-line"></span>
            <span class="mo-nav-button-line"></span>
            <span class="mo-nav-button-line"></span>
        </div>
    </div>
</button>
<nav class="mo-main-nav">
    <div class="mo-main-nav-bg"></div>
    <div class="mo-main-nav-list">
        <nav class="mo-nav-parent">
            {!! Menus::render('main') !!}
        </nav>
    </div>
    <div class="mo-main-nav-aside">
        @include('core::public._social')
        @section('lang-switcher')
            @include('core::public._lang-switcher')
        @show
    </div>
</nav>
<!-- END HEADER -->