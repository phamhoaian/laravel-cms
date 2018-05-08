<div class="btn-group-prev-next">
    <div class="btn-group">
    	@if ($prev = $module::prev($model))
        <a class="btn btn-sm btn-prev btn-default" href="@if ($prev){{ route($lang.'::'.str_singular($model->getTable()), $prev->slug) }}@endif">@lang('db.Previous')</a>
        @endif
        @if ($next = $module::next($model))
        <a class="btn btn-sm btn-next btn-default" href="@if ($next){{ route($lang.'::'.str_singular($model->getTable()), $next->slug) }}@endif">@lang('db.Next')</a>
        @endif
    </div>
</div>
