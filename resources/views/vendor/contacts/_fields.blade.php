{!! Honeypot::generate('my_name', 'my_time') !!}
{!! BootForm::hidden('language')->value(isset($model->language) ? $model->language : config('app.locale')) !!}
{!! BootForm::hidden('id') !!}

<div class="row">

    <div class="col-sm-5">
        {!! BootForm::text('<span class="fa fa-asterisk"></span> '.Lang::get('db.First name'), 'first_name') !!}
    </div>
    <div class="col-sm-5">
        {!! BootForm::text('<span class="fa fa-asterisk"></span> '.Lang::get('db.Last name'), 'last_name') !!}
    </div>

</div>

{!! BootForm::email('<span class="fa fa-asterisk"></span> '.__('Email'), 'email') !!}
{{-- BootForm::text(__('Website'), 'website') --}}
{{-- BootForm::text(__('Company'), 'company') --}}
{{-- BootForm::text(__('Address'), 'address') --}}
{{-- BootForm::text(__('Postcode'), 'postcode') --}}
{{-- BootForm::text(__('City'), 'city') --}}
{{-- BootForm::text(__('Country'), 'country') --}}
{!! BootForm::text(Lang::get('db.Phone'), 'phone') !!}
{{-- BootForm::text(__('Mobile'), 'mobile') --}}
{{-- BootForm::text(__('Fax'), 'fax') --}}
{!! BootForm::textarea('<span class="fa fa-asterisk"></span> '.Lang::get('db.Message'), 'message') !!}
{!! BootForm::file(Lang::get('db.Attached file'), 'attached') !!}