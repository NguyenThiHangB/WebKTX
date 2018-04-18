@extends('layouts.default')
@section('title', __('labels.region_manager'))
@section('title_content', __('titles.list_region'))
@section('content')
<div class="title_right">
	{{ Form::open(['url' => route('regions.index'), 'method' => 'GET']) }}
	    <div class="form-group top_search">
            <div class="input-group  col-sm-12">
            	<div class="col-sm-6">
	            	{{ Form::label('name', __('Tên khu'), ['class' => 'control-label']) }}
	                {{ Form::text('name', null, ['class' =>'form-control', 'placeholder' => __('Nhập tên khu...')]) }}
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
				<th>{{ __('Tên khu') }}</th>
				<th>{{ __('Số lượng dãy') }}</th>
				<th style="text-align: center;">Hoạt động</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($regions as $key => $region)
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $region->name }}</td>
				<td>{{ $region->number_row }}</td>
				<td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('regions.edit', $region->id), '<i class="fa fa-fw fa-edit"></i> ' . __('Sửa'), ['class' => 'btn btn-primary']))
                    !!}
                    @include('layouts.partials.button_modal', ['nameRoute' => 'regions.destroy', 'record' => $region, 'colorButton' => 'danger', 'iconButton' => 'fa-trash-o', 'nameModal' => 'delete'])
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
        <div class="col-md-4 text-left">
            <p class="pagination">
                <a class="btn btn-primary" href="{{ route('regions.create') }}">{{ __('Thêm mới') }}</a>
            </p>
        </div>
    </div>
</div>     
@stop