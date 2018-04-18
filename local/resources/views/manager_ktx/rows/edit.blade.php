@extends('layouts.default')
@section('title', __('labels.row_manager'))
@section('title_content', __('titles.edit_row'))
@section('content')
	{{ Form::model($row, ['url' => route('rows.update', $row->id), 'method' => 'PUT', 'class' => 'form-horizontal form-label-left']) }}
        @include('manager_ktx.rows.partials.form')
    {{ Form::close() }}
@stop