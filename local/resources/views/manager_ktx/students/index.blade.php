@extends('layouts.default')
@section('title', __('labels.student_manager'))
@section('title_content', __('titles.list_student'))
@section('content')
<div class="title_right">
    {{ Form::open(['url' => route('students.index'), 'method' => 'GET']) }}
        <div class="col-md-12 form-group top_search">
            <div class="input-group col-sm-12">
                <div class="col-sm-3"> 
                    {{ Form::label('code_student', __('Mã sinh viên'), ['class' => 'control-label']) }}
                    {{ Form::text('code_student', null, ['class' =>'form-control', 'placeholder' => 'Nhập mã sinh viên...'])}}
                </div>
                <div class="col-sm-3"> 
                    {{ Form::label('name', __('Tên sinh viên'), ['class' => 'control-label']) }}
                    {{ Form::text('name', null, ['class' =>'form-control', 'placeholder' => 'Nhập tên sinh viên ...'])}}
                </div>  
                <div class="col-sm-3"> 
                    {{ Form::label('phone', __('Số điện thoại'), ['class' => 'control-label']) }}
                    {{ Form::text('phone', null, ['class' =>'form-control', 'placeholder' => 'Nhập số điện thoại ...'])}}
                </div>
                <div class="col-sm-3"> 
                    {{ Form::label('address', __('Địa chỉ'), ['class' => 'control-label']) }}
                    {{ Form::text('address', null, ['class' =>'form-control', 'placeholder' => 'Nhập địa chỉ ...'])}}
                </div>
            </div>
            <div class="input-group col-sm-12">
                <div class="col-sm-3"> 
                    {{ Form::label('region_id', __('Khu'), ['class' => 'control-label']) }}
                    {{ Form::select('region_id', [null => null] + $regions, null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-3"> 
                    {{ Form::label('cource_id', __('Khóa'), ['class' => 'control-label']) }}
                    {{ Form::select('cource_id', [null => null] + $cources, null, ['class' => 'form-control']) }}
                </div>  
                <div class="col-sm-3"> 
                    {{ Form::label('room_id', __('Phòng'), ['class' => 'control-label']) }}
                    {{ Form::select('room_id', [null => null] + $rooms, null, ['class' => 'form-control']) }}
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
                <th>{{ __('Mã sinh viên') }}</th>
                <th>{{ __('Họ tên') }}</th>
                <th>{{ __('Ngày sinh') }}</th>
                <th>{{ __('Giới tính') }}</th>
                <th>{{ __('Lớp') }}</th>
                <th>{{ __('Khóa') }}</th>
                <th>{{ __('CMND') }}</th>
                <th>{{ __('Điện thoại') }}</th>
                <th>{{ __('Địa chỉ') }}</th>
                <th>{{ __('Trạng thái') }}</th>
                <th colspan="3" style="text-align: center;">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $key => $student)
            <tr>
                @php $serial = $key + ($students->currentPage() - 1) * $students->perPage() + 1; @endphp
                <td>{{ number_format($serial) }}</td>
                <td>{{ $student->code_student }}</td>
                <td>{{ $student->name}}</td>
                <td>{{ $student->birth->format('d-m-Y') }}</td>
                <td>{{ ($student->gender == App\Models\Student::GENDER_FEMALE) ? App\Models\Student::$gender[App\Models\Student::GENDER_FEMALE] : App\Models\Student::$gender[App\Models\Student::GENDER_MALE] }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->cource->name ?? null}}</td>
                <td>{{ $student->identity_card }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->address }}</td>
                <td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('students.show', $student->id), __('Chi tiết'), ['class' => 'btn btn-info']))
                    !!}
                </td>
                <td style="text-align: center;">
                    {!!
                       Html::decode(Html::link(route('students.edit', $student->id), '<i class="fa fa-fw fa-edit"></i> ' . __('Sửa'), ['class' => 'btn btn-primary']))
                    !!}
                </td>
                <td style="text-align: center;">
                    @include('layouts.partials.button_modal', ['nameRoute' => 'students.destroy', 'record' => $student, 'colorButton' => 'danger', 'iconButton' => 'fa-trash-o', 'nameModal' => 'delete'])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4 text-left">
            <p class="pagination">
                <a class="btn btn-primary" href="{{ route('students.create') }}">{{ __('Thêm mới') }}</a>
            </p>
        </div>
        <div class="col-md-8 text-right">
            {{ $students->appends(app('request')->all())->links() }}
        </div>
    </div>
</div>
@stop
