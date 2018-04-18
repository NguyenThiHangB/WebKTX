<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('name', 'Tên dãy <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('region_id', 'Tên khu <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('region_id', ['' => ''] + $regions, null, ['class' => 'form-control']) }}
			{!! $errors->first('region_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('number_room') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('number_room', 'Số lượng phòng <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('number_room', null, ['class' => 'form-control']) }}
			{!! $errors->first('number_room', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<a class="btn btn-primary" href="{{ route('rows.index') }}">{{ __('Cancel') }}</a>
		{{ Form::button(__('Reset'), ['type' => 'reset', 'name' => 'reset', 'class' => 'btn btn-primary'] )  }}
		{{ Form::button(__('Save'), ['type' => 'submit', 'name' => 'submit_save', 'class' => 'btn btn-success'] )  }}
	</div>
</div>
