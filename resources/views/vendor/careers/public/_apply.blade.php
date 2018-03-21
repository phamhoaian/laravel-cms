<!-- APPLY -->
<section id="modal-apply" class="modal" style="display: none">
	<div class="modal-wrapper">
		<div class="modal-content">
			<a href="javascript:void(0)" id="btn-apply-close" class="btn-close">
				<span class="btn-close-line"></span>
				<span class="btn-close-line"></span>
			</a>
			<dl class="career">
				<h3>@lang('Open positions')</h3>
				@include('careers::public._list', ['items' => $items])
			</dl>
		</div>
	</div>
</section>
<!-- END APPLY -->