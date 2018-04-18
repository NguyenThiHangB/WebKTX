@extends('layouts.default')
@section('title', __('labels.row_manager'))
@section('title_content', __('titles.create_row'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('rows.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.rows.partials.form')
	{{ Form::close() }}
</div>
@stop