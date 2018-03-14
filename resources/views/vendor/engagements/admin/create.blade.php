@extends('core::admin.master')

@section('title', __('New engagement'))

@section('content')

    @include('core::admin._button-back', ['module' => 'engagements'])
    <h1>
        @lang('New engagement')
    </h1>

    {!! BootForm::open()->action(route('admin::index-engagements'))->multipart()->role('form') !!}
        @include('engagements::admin._form')
    {!! BootForm::close() !!}

@endsection
