@extends('layouts.default')
@section('title', __('labels.employee_manager'))
@section('title_content', __('titles.create_employee'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('employees.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.employees.partials.form')
	{{ Form::close() }}
</div>
@stop