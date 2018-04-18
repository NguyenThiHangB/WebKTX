@extends('layouts.default')
@section('title', __('labels.room_manager'))
@section('title_content', __('titles.create_room'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('rooms.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.rooms.partials.form')
	{{ Form::close() }}
</div>
@stop