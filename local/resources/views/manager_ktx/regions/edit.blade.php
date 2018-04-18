@extends('layouts.default')
@section('title', __('labels.region_manager'))
@section('title_content', __('titles.edit_region'))
@section('content')
	{{ Form::model($region, ['url' => route('regions.update', $region->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.regions.partials.form')
    {{ Form::close() }}
@stop