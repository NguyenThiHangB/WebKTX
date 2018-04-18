<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerktx\CreateStudentRequest;
use App\Http\Requests\Managerktx\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models as Database;
use App\Models\Student;
use App\Models\Cource;
use App\Models\Region;
use App\Models\Room;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cources = Cource::getNameCource();
        $rooms = Room::getNameRoom();
        $regions = Region::getNameRegion();
        $students = Student::getListStudent($request->all());

        return view('manager_ktx.students.index', compact('cources', 'rooms', 'regions', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cources = Cource::getNameCource();
        $regions = Region::getNameRegion();
        $rooms = Room::getRoom();

        return view('manager_ktx.students.create', compact('cources', 'regions', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::createStudent($request->all());

        if (isset($student)) {
            flash('Thêm sinh viên thành công.')->succecs();
            return redirect()->route('students.index');
        } else {
            flash('Thêm sinh viên thất bại, vui lòng thử lại.')->error();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cources = Cource::getNameCource();
        $rooms = Room::getNameRoom();
        $regions = Region::getNameRegion();
        $student = Student::showStudent($id);

        return view('manager_ktx.students.show', compact('cources', 'regions', 'rooms', 'student'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cources = Cource::getNameCource();
        $rooms = Room::getNameRoom();
        $regions = Region::getNameRegion();
        $student = Student::findStudent($id);

        return view('manager_ktx.students.edit', compact('cources', 'regions', 'rooms', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::updateStudent($request->all(), $id);

        if (isset($student)) {
            flash('Cập nhật sinh viên thành công.')->success();
            return redirect()->route('students.index');
        } else {
            flash('Cập nhật thất bại, vui lòng thử lại.')->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\Student $student)
    {
        $student = Student::deleteStudent($student);

        if (isset($student)) {
            flash(__('Xóa thành công.'))->success();
        } else {
            flash( __('Xóa thất bại, vui lòng thử lại.'))->error();
        }

        return redirect()->route('students.index');
    }
}
