@extends('layouts.default')
@section('title', __('labels.position_manager'))
@section('title_content', __('titles.create_position'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('positions.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.positions.partials.form')
	{{ Form::close() }}
</div>
@stop