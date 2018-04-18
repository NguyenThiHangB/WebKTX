<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('name', 'Tên loại phòng <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('price', 'Giá phòng <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('price', null, ['class' => 'form-control', 'maxlength' => 20]) }}
			{!! $errors->first('price', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('student_max') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('student_max', 'Số sinh viên tối đa <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('student_max', null, ['class' => 'form-control', 'maxlength' => 20]) }}
			{!! $errors->first('student_max', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<a class="btn btn-primary" href="{{ route('typerooms.index') }}">{{ __('Cancel') }}</a>
		{{ Form::button(__('Reset'), ['type' => 'reset', 'name' => 'reset', 'class' => 'btn btn-primary'] )  }}
		{{ Form::button(__('Save'), ['type' => 'submit', 'name' => 'submit_save', 'class' => 'btn btn-success'] )  }}
	</div>
</div>