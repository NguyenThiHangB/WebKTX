@extends('layouts.default')
@section('title', __('labels.row_manager'))
@section('title_content', __('titles.list_row'))
@section('content')
<div class="title_right">
	{{ Form::open(['url' => route('rows.index'), 'method' => 'GET']) }}
	    <div class="form-group top_search">
	    	<div class="input-group col-sm-12">
	            <div class="col-sm-6">
	            	{{ Form::label('name', __('Tên dãy'), ['class' => 'control-label']) }}
	                {{ Form::text('name', null, ['class' =>'form-control', 'placeholder' => __('Nhập tên dãy...')]) }}
	            </div>
	            <div class="col-sm-6">
	            	{{ Form::label('region_id', __('Tên khu'), ['class' => 'control-label']) }}
	            	{{ Form::select('region_id', [null => null] + $regions, null, ['class' => 'form-control']) }}
	            </div>
	        </div>
	        <div class="input-group">
	        	<div class="col-sm-6">
		        	{{ Form::button(__('Tìm kiếm'), ['type' => 'submit', 'name' => 'submit_search', 'class' => 'btn btn-success'] )  }}
		        </div>
	        </div>	
	    </div>
    {{ Form::close() }}
</div>
@include('flash::message')
<div class="x_content">
	<table id="datatable" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>{{ __('STT') }}</th>
				<th>{{ __('Tên dãy') }}</th>
				<th>{{ __('Tên khu') }}</th>
				<th>{{ __('Số lượng phòng') }}</th>
				<th style="text-align: center;">Hoạt động</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($rows as $key => $row)
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $row->name }}</td>
				<td>{{ $row->region->name }}</td>
				<td>{{ $row->number_room }}</td>
				<td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('rows.edit', $row->id), '<i class="fa fa-fw fa-edit"></i> ' . __('Sửa'), ['class' => 'btn btn-primary']))
                    !!}
                    @include('layouts.partials.button_modal', ['nameRoute' => 'rows.destroy', 'record' => $row, 'colorButton' => 'danger', 'iconButton' => 'fa-trash-o', 'nameModal' => 'delete'])
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
        <div class="col-md-4 text-left">
            <p class="pagination">
                <a class="btn btn-primary" href="{{ route('rows.create') }}">{{ __('Thêm mới') }}</a>
            </p>
        </div>
    </div>
</div>     
@stop