@extends('pages::public.master')

@section('wraperClass', 'half')

@section('bodyClass', 'body-contacts body-contacts-form body-page body-page-'.$page->id)

@push('js')
    <script>
      function initMap() {
        var pos_hcm = {lat: 10.7803611, lng: 106.6954407};
        var map_hcm = new google.maps.Map(document.getElementById('map_hcm'), {
          zoom: 19,
          center: pos_hcm
        });
        var marker_hn = new google.maps.Marker({
          position: pos_hcm,
          map: map_hcm
        });

        var pos_hn = {lat: 10.7803611, lng: 106.6954407};
        var map_hn = new google.maps.Map(document.getElementById('map_hn'), {
          zoom: 19,
          center: pos_hn
        });
        var marker_hn = new google.maps.Marker({
          position: pos_hn,
          map: map_hn
        });
      }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjpAJ-nMrD7Db5kEZ3WgKT5RsFhPOF86s&callback=initMap">
    </script>
@endpush

@section('content')

    <!-- CONTENT NAV -->
    <nav class="content-nav fixed">
        <ul class="parent">
            <li>
                <span>@lang('db.Company')</span>
                {!! Menus::render('company') !!}
            </li>
        </ul>
    </nav>
    <!-- END CONTENT NAV -->

    @if ($page->image)
    <section class="content-header-bg">
        <img src="{!! url($page->present()->thumbSrc()) !!} " alt="" width="1000px">
    </section>
    @endif

    <section class="content">
        <div class="main-content">
            <div class="contact">
                {!! $page->present()->body !!}

                @if (!$errors->isEmpty())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @lang('db.message when errors in form').
                        <ul>
                            @foreach ($errors->all() as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="left">
                    <div class="contact-info">
                        <h3>Ho Chi Minh City</h3>
                        <p>96 Nguyen Thi Minh Khai St., W.6, Dist.3</p>
                        <p>Phone: (028) 38 272 909</p>
                        <p>Fax: (028) 38 272 169</p>
                        <div id="map_hcm" class="map"></div>
                    </div>
                </div>

                <div class="right">
                    <div class="contact-form" style="margin-bottom: 30px">
                        {!! BootForm::open()->action(route($lang.'::store-contact'))->multipart() !!}

                        @include('contacts::_fields')

                        <input class="btn-primary btn btn-block btn-lg" type="submit" value="@lang('db.Send')">

                        {!! BootForm::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
