<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerktx\CreateEmployeeRequest;
use App\Http\Requests\Managerktx\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Models as Database;
use App\Models\Employee;
use App\Models\Position;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $positions = Position::getPosition();
        $employees = Employee::getListEmployees($request->all());
        
        return view('manager_ktx.employees.index', compact('employees', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::getPosition();
        return view('manager_ktx.employees.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $employee = Employee::createEmployee($request->all());

        if ($employee) {
            flash('Thêm nhân viên thành công.')->success();
            return redirect()->route('employees.index');
        } else {
            flash('Thêm thất bại, vui lòng thử lại')->error();
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Position::getPosition();
        $employee = Employee::findEmployee($id);

        return view('manager_ktx.employees.edit', compact('positions', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $success = Employee::updateEmployee($request->all(), $id);

        if ($success) {
            flash('Cập nhật thành công.')->success();
            return redirect()->route('employees.index');
        } else {
            flash( __('Cập nhật thất bại, vui lòng thử lại.'))->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\Employee $employee)
    {
        $employee = Employee::deleteEmployee($employee);

        if (isset($employee)) {
            flash(__('Xóa thành công.'))->success();
        } else {
            flash( __('Xóa thất bại, vui lòng thử lại.'))->error();
        }

        return redirect()->route('employees.index');
    }
}
