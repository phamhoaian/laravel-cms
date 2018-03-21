@extends('core::admin.master')

@section('title', __('New career'))

@section('content')

    @include('core::admin._button-back', ['module' => 'careers'])
    <h1>
        @lang('New career')
    </h1>

    {!! BootForm::open()->action(route('admin::index-careers'))->multipart()->role('form') !!}
        @include('careers::admin._form')
    {!! BootForm::close() !!}

@endsection
