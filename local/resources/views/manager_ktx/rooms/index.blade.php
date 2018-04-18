@extends('layouts.default')
@section('title', __('labels.room_manager'))
@section('title_content', __('titles.list_room'))
@section('content')
<div class="title_right">
	{{ Form::open(['url' => route('rooms.index'), 'method' => 'GET']) }}
	    <div class="form-group top_search">
	    	<div class="input-group col-sm-12">
                <div class="col-sm-4">
                	{{ Form::label('name', __('Tên phòng'), ['class' => 'control-label']) }}
                    {{ Form::text('name', null, ['class' =>'form-control', 'placeholder' => __('Nhập tên phòng...')]) }}
                </div>
                <div class="col-sm-4"> 
                    {{ Form::label('row_id', __('Dãy'), ['class' => 'control-label col-md-1']) }}
	        		{{ Form::select('row_id', [null => null] + $rows, null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-4"> 
                    {{ Form::label('type_room_id', __('Loại phòng'), ['class' => 'control-label']) }}
	        		{{ Form::select('type_room_id', [null => null] + $type_rooms, null, ['class' => 'form-control']) }}
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
				<th>{{ __('Tên phòng') }}</th>
				<th>{{ __('Dãy') }}</th>
				<th>{{ __('Loại phòng') }}</th>
				<th>{{ __('Số sinh viên tối đa') }}</th>
				<th>{{ __('Số sinh viên hiện tại') }}</th>
				<th>{{ __('Chú ý') }}</th>
				<th style="text-align: center;">Hoạt động</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($rooms as $key => $room)
			<tr>
				@php $serial = $key + ($rooms->currentPage() - 1) * $rooms->perPage() + 1; @endphp
				<td>{{ number_format($serial) }}</td>
				<td>{{ $room->name }}</td>
				<td>{{ $room->row->name }}</td>
				<td>{{ $room->type_room->name ?? null }}</td>
				<td>{{ $room->numnber_student_max }}</td>
				<td>{{ $room->numnber_student_present }}</td>
				<td>{{ $room->note }}</td>
				<td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('rooms.edit', $room->id), '<i class="fa fa-fw fa-edit"></i> ' . __('Sửa'), ['class' => 'btn btn-primary']))
                    !!}
                    @include('layouts.partials.button_modal', ['nameRoute' => 'rooms.destroy', 'record' => $room, 'colorButton' => 'danger', 'iconButton' => 'fa-trash-o', 'nameModal' => 'delete'])
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
        <div class="col-md-4 text-left">
            <p class="pagination">
                <a class="btn btn-primary" href="{{ route('rooms.create') }}">{{ __('Thêm mới') }}</a>
            </p>
        </div>
        <div class="col-md-8 text-right">
            {{ $rooms->appends(app('request')->all())->links() }}
        </div>
    </div>
</div>     
@stop