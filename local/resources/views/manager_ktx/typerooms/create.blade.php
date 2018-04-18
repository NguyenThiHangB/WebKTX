@extends('layouts.default')
@section('title', __('labels.type_room_manager'))
@section('title_content', __('titles.create_typeroom'))
@section('content')
<div class="x_content">
	{{ Form::open(['url' => route('typerooms.store'), 'method' => 'POST', 'class' => 'form-horizontal form-label-left']) }}
		@include('manager_ktx.typerooms.partials.form')
	{{ Form::close() }}
</div>    
@stop