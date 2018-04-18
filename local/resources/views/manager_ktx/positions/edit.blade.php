@extends('layouts.default')
@section('title', __('labels.position_manager'))
@section('title_content', __('titles.edit_position'))
@section('content')
	{{ Form::model($position, ['url' => route('positions.update', $position->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.positions.partials.form')
    {{ Form::close() }}
@stop