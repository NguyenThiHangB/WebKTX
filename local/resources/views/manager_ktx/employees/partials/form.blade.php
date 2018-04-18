<div class="form-group {{ $errors->has('code_employee') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('code_employee', 'Mã nhân viên <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('code_employee', null, ['class' => 'form-control', 'maxlength' => 10]) }}
			{!! $errors->first('code_employee', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('name', 'Họ tên <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('birth') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('birth', 'Ngày sinh <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="input-group col-xs-12">
				<div class="input-group-addon">
	                <i class="fa fa-calendar"></i>
	            </div>
				{{ Form::text('birth', null, ['class' => 'form-control datepicker', 'id' => 'birth']) }}		
			</div>
			{!! $errors->first('birth', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('gender', 'Giới tính <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label class="radio-inline">
	            {{ Form::radio('gender', App\Models\Employee::GENDER_MALE) }}
	            {{ __(App\Models\Employee::$gender[App\Models\Employee::GENDER_MALE]) }}
	        </label>
	        <label class="radio-inline">
	            {{ Form::radio('gender', App\Models\Employee::GENDER_FEMALE) }}
	            {{ __(App\Models\Employee::$gender[App\Models\Employee::GENDER_FEMALE]) }}
	        </label>
	        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('phone', 'Điện thoại <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 20]) }}
			{!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('address', 'Địa chỉ <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => 2, 'maxlength' => 255]) }}
			{!! $errors->first('address', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('position_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('position_id', 'Chức vụ <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('position_id', ['' => ''] + $positions, null, ['class' => 'form-control']) }}
			{!! $errors->first('position_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<a class="btn btn-primary" href="{{ route('employees.index') }}">{{ __('Cancel') }}</a>
		{{ Form::button(__('Reset'), ['type' => 'reset', 'name' => 'reset', 'class' => 'btn btn-info'] )  }}
		{{ Form::button(__('Save'), ['type' => 'submit', 'name' => 'submit_save', 'class' => 'btn btn-success'] )  }}
	</div>
</div>
