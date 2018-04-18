@extends('layouts.default')
@section('title', __('labels.student_manager'))
@section('title_content', __('titles.edit_student'))
@section('content')
	{{ Form::model($student, ['url' => route('students.update', $student->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.students.partials.form')
    {{ Form::close() }}
@stop