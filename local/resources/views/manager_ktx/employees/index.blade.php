@extends('layouts.default')
@section('title', __('labels.employee_manager'))
@section('title_content', __('titles.list_employee'))
@section('content')
<div class="title_right">
    {{ Form::open(['url' => route('employees.index'), 'method' => 'GET']) }}
        <div class="form-group top_search">
            <div class="input-group col-sm-12">
                <div class="col-sm-6"> 
                    {{ Form::label('code_employee', __('Mã nhân viên'), ['class' => 'control-label']) }}
                    {{ Form::text('code_employee', null, ['class' =>'form-control', 'placeholder' => 'Nhập mã nhân viên...'])}}
                </div>
                <div class="col-sm-6"> 
                    {{ Form::label('name', __('Tên nhân viên'), ['class' => 'control-label']) }}
                    {{ Form::text('name', null, ['class' =>'form-control', 'placeholder' => 'Nhập tên nhân viên ...'])}}
                </div>
            </div>
            <div class="input-group col-sm-12">
                <div class="col-sm-6"> 
                    {{ Form::label('phone', __('Số điện thoại'), ['class' => 'control-label']) }}
                    {{ Form::text('phone', null, ['class' =>'form-control', 'placeholder' => 'Nhập số điện thoại ...'])}}
                </div>
                <div class="col-sm-6"> 
                    {{ Form::label('address', __('Địa chỉ'), ['class' => 'control-label']) }}
                    {{ Form::text('address', null, ['class' =>'form-control', 'placeholder' => 'Nhập địa chỉ ...'])}}
                </div>
            </div>
            <div class="input-group col-sm-12">
                <div class="col-sm-6">
                    {{ Form::label('position_id', __('Chức vụ'), ['class' => 'control-label']) }}
                    {{ Form::select('position_id', [null => null] + $positions, null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="input-group col-sm-12">
                <div class="col-sm-6"> 
                    {{ Form::button(__('Tìm kiếm'), ['type' => 'submit', 'name' => 'submit_search', 'class' => 'btn btn-success'] ) }}
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
                <th>{{ __('Mã nhân viên') }}</th>
                <th>{{ __('Họ tên') }}</th>
                <th>{{ __('Ngày sinh') }}</th>
                <th>{{ __('Giới tính') }}</th>
                <th>{{ __('Điện thoại') }}</th>
                <th>{{ __('Địa chỉ') }}</th>
                <th>{{ __('Chức vụ') }}</th>
                <th style="text-align: center;">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key => $employee)
            <tr>
                @php $serial = $key + ($employees->currentPage() - 1) * $employees->perPage() + 1; @endphp
                <td>{{ number_format($serial) }}</td>
                <td>{{ $employee->code_employee }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->birth->format('d-m-Y') }}</td>
                <td>{{ ($employee->gender == App\Models\Employee::GENDER_FEMALE) ? App\Models\Employee::$gender[App\Models\Employee::GENDER_FEMALE] : App\Models\Employee::$gender[App\Models\Employee::GENDER_MALE] }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->address }}</td>
                <td>{{ $employee->position->name ?? null }}</td>
                <td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('employees.edit', $employee->id), '<i class="fa fa-fw fa-edit"></i> ' . __('Sửa'), ['class' => 'btn btn-primary']))
                    !!}
                    @include('layouts.partials.button_modal', ['nameRoute' => 'employees.destroy', 'record' => $employee, 'colorButton' => 'danger', 'iconButton' => 'fa-trash-o', 'nameModal' => 'delete'])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4 text-left">
            <p class="pagination">
                <a class="btn btn-primary" href="{{ route('employees.create') }}">{{ __('Thêm mới') }}</a>
            </p>
        </div>
        <div class="col-md-8 text-right">
            {{ $employees->appends(app('request')->all())->links() }}
        </div>
    </div>
</div>     
@stop