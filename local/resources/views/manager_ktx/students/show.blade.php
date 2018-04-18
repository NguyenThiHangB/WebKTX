@extends('layouts.default')
@section('title', __('labels.student_manager'))
@section('title_content', __('titles.detail_student'))
@section('content')
<div class="x_content">
	{{  Form::model($student, ['url' => route('students.show', $student->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
		<div class="form-group">
			{{ Form::label('code_student', __('Mã sinh viên'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::text('code_student', null, ['class' => 'form-control', 'maxlength' => 10]) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('name', __('Họ tên sinh viên'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('birth', __('Ngày sinh'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="input-group col-xs-12">
					<div class="input-group-addon">
		                <i class="fa fa-calendar"></i>
		            </div>
					{{ Form::text('birth', $student->birth->format('d-m-Y'), ['class' => 'form-control datepicker', 'id' => 'birth']) }}
				</div>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('gender', __('Giới tính'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				<label class="radio-inline">
		            {{ Form::radio('gender', App\Models\Student::GENDER_MALE) }}
		            {{ __(App\Models\Student::$gender[App\Models\Student::GENDER_MALE]) }}
		        </label>
		        <label class="radio-inline">
		            {{ Form::radio('gender', App\Models\Student::GENDER_FEMALE) }}
		            {{ __(App\Models\Student::$gender[App\Models\Student::GENDER_FEMALE]) }}
		        </label>
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('class', __('Lớp'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::text('class', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('cource_id', __('Khóa'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::select('cource_id', $cources, null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('identity_card', __('Nơi cấp'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::text('identity_card', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('phone', __('Điện thoại'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::text('phone', null, ['class' => 'form-control', 'maxlength' => 20]) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('address', __('Địa chỉ'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::textarea('address', null, ['class' => 'form-control', 'rows' => 2, 'maxlength' => 255]) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('region_id', __('Khu'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::select('region_id', $regions, null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('room_id', __('Phòng'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::select('room_id', $rooms, null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('class', __('Chi chú'), ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) }}
			<div class="col-md-6 col-sm-6 col-xs-12">
				{{ Form::text('class', null, ['class' => 'form-control', 'maxlength' => 50]) }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<a class="btn btn-primary" href="{{ route('students.index') }}">{{ __('Cancel') }}</a>
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop