@extends('layouts.default')
@section('title', __('labels.student_manager'))
@section('title_content', __('titles.create_student'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('students.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.students.partials.form')
	{{ Form::close() }}
</div>
@stop