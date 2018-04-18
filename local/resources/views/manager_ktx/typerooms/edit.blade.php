@extends('layouts.default')
@section('title', __('labels.type_room_manager'))
@section('title_content', __('titles.edit_typeroom'))
@section('content')
<div class="x_content">
	{{ Form::model($typeroom, ['url' => route('typerooms.update', $typeroom->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.typerooms.partials.form')
    {{ Form::close() }}
</div>    
@stop