@php
	$entryName = !isset($entryName) || empty($entryName) ? '' : $entryName;
	$modalId = !isset($modalId) || empty($modalId) ? '' : $modalId;
	$close = !isset($close) || $close == true ? true : false;
	$backdrop = !isset($backdrop) || $backdrop == true ? 'true' : 'false';
	$keyboard = !isset($keyboard) || $keyboard == true ? 'true' : 'false';
	$size = !isset($size) || empty($size) ? '' : $size;
@endphp

<div class="modal fade" tabindex="-1" role="dialog" id="{{$modalId}}" data-backdrop="{{$backdrop}}" data-keyboard="{{$keyboard}}">
	<div class="modal-dialog {{$size}}" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">{{$entryName}}</h4>
				@if($close)
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				@endif
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>