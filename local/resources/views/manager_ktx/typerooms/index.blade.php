@extends('layouts.default')
@section('title', __('labels.type_room_manager'))
@section('title_content', __('titles.list_typeroom'))
@section('content')
<div class="title_right">
    {{ Form::open(['url' => route('typerooms.index'), 'method' => 'GET']) }}
        <div class="form-group top_search">
            <div class="input-group col-sm-12">
                <div class="col-sm-6">
                    {{ Form::text('name', null, ['class' =>'form-control', 'placeholder' => __('Nhập thông tin tìm kiếm ...')]) }}
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
                <th>{{ __('Tên loại phòng') }}</th>
                <th>{{ __('Giá phòng') }}</th>
                <th>{{ __('Số người tối đa') }}</th>
                <th colspan="2" style="text-align: center;">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($typerooms as $key => $typeroom)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $typeroom->name }}</td>
                <td>{{ $typeroom->price }}</td>
                <td>{{ $typeroom->student_max }}</td>
                <td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('typerooms.edit', $typeroom->id), '<i class="fa fa-fw fa-edit"></i> ' . __('Sửa'), ['class' => 'btn btn-primary']))
                    !!}
                    @include('layouts.partials.button_modal', ['nameRoute' => 'typerooms.destroy', 'record' => $typeroom, 'colorButton' => 'danger', 'iconButton' => 'fa-trash-o', 'nameModal' => 'delete'])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4 text-left">
            <p class="pagination">
                <a class="btn btn-primary" href="{{ route('typerooms.create') }}">{{ __('Thêm mới') }}</a>
            </p>
        </div>
    </div>
</div>     
@stop