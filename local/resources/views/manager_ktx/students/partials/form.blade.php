<div class="form-group {{ $errors->has('code_student') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('code_student', 'Mã sinh viên <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('code_student', null, ['class' => 'form-control', 'maxlength' => 10]) }}
			{!! $errors->first('code_student', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('name', 'Họ sinh viên <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
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
	            {{ Form::radio('gender', App\Models\Student::GENDER_MALE) }}
	            {{ __(App\Models\Student::$gender[App\Models\Student::GENDER_MALE]) }}
	        </label>
	        <label class="radio-inline">
	            {{ Form::radio('gender', App\Models\Student::GENDER_FEMALE) }}
	            {{ __(App\Models\Student::$gender[App\Models\Student::GENDER_FEMALE]) }}
	        </label>
	        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('class', 'Lớp <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('class', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			{!! $errors->first('class', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('cource_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('cource_id', 'Khóa <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('cource_id', ['' => ''] + $cources, null, ['class' => 'form-control']) }}
			{!! $errors->first('cource_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('identity_card') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('identity_card', 'CMND <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::text('identity_card', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			{!! $errors->first('identity_card', '<span class="help-block">:message</span>') !!}
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
<div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('region_id', 'Khu <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('region_id', ['' => ''] + $regions, null, ['class' => 'form-control']) }}
			{!! $errors->first('region_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group {{ $errors->has('room_id') ? 'has-error' : '' }}">
	<div class="form-group">
		{!! Html::decode(Form::label('room_id', 'Phòng <span class="red">*</span>', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'])) !!}
		<div class="col-md-6 col-sm-6 col-xs-12">
			{{ Form::select('room_id', ['' => ''] + $rooms, null, ['class' => 'form-control']) }}
			{!! $errors->first('room_id', '<span class="help-block">:message</span>') !!}
		</div>
	</div>
</div>
<div class="form-group">
	{{ Form::label('class', __('Chi chú'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
	<div class="col-md-6 col-sm-6 col-xs-12">
		{{ Form::text('class', null, ['class' => 'form-control', 'maxlength' => 50]) }}
	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
		<a class="btn btn-primary" href="{{ route('students.index') }}">{{ __('Cancel') }}</a>
		{{ Form::button(__('Reset'), ['type' => 'reset', 'name' => 'reset', 'class' => 'btn btn-info'] )  }}
		{{ Form::button(__('Save'), ['type' => 'submit', 'name' => 'submit_save', 'class' => 'btn btn-success'] )  }}
	</div>
</div>
