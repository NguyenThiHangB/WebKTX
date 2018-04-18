@extends('layouts.default')
@section('title', __('labels.employee_manager'))
@section('title_content', __('titles.edit_employee'))
@section('content')
	{{ Form::model($employee, ['url' => route('employees.update', $employee->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.employees.partials.form')
    {{ Form::close() }}
@stop