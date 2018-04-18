@extends('layouts.default')
@section('title', __('labels.region_manager'))
@section('title_content', __('titles.create_region'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('regions.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.regions.partials.form')
	{{ Form::close() }}
</div>
@stop