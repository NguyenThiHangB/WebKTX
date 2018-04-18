<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('name', 'Tên phòng <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('row_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('row_id', 'Tên dãy <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('row_id', ['' => ''] + $rows, null, ['class' => 'form-control']) }}
			{!! $errors->first('row_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('type_room_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('type_room_id', 'Loại phòng <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('type_room_id', ['' => ''] + $type_rooms, null, ['class' => 'form-control']) }}
			{!! $errors->first('type_room_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('numnber_student_max') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('numnber_student_max', 'Số sinh viên tối đa <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('numnber_student_max', null, ['class' => 'form-control']) }}
			{!! $errors->first('numnber_student_max', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('numnber_student_present') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('numnber_student_present', 'Số sinh viên hiện tại <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('numnber_student_present', null, ['class' => 'form-control']) }}
			{!! $errors->first('numnber_student_present', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
	<div class="form-group">
		{{ Form::label('note', __('Ghi chú'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('note', null, ['class' => 'form-control']) }}
			{!! $errors->first('note', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<a class="btn btn-primary" href="{{ route('rooms.index') }}">{{ __('Cancel') }}</a>
		{{ Form::button(__('Reset'), ['type' => 'reset', 'name' => 'reset', 'class' => 'btn btn-primary'] )  }}
		{{ Form::button(__('Save'), ['type' => 'submit', 'name' => 'submit_save', 'class' => 'btn btn-success'] )  }}
	</div>
</div>
