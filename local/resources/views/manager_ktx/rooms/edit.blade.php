@extends('layouts.default')
@section('title', __('labels.room_manager'))
@section('title_content', __('titles.edit_room'))
@section('content')
	{{ Form::model($room, ['url' => route('rooms.update', $room->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.rooms.partials.form')
    {{ Form::close() }}
@stop