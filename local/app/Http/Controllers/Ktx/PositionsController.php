<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Managerktx\CreatePositionRequest;
use App\Http\Requests\Managerktx\UpdatePositionRequest;
use App\Models as Database;
use App\Models\Position;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::getListPosition();

        return view('manager_ktx.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager_ktx.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePositionRequest $request)
    {
        $position = Position::createPosition($request->all());

        if ($position) {
            flash('Thêm nhân viên thành công.')->success();
            return redirect()->route('positions.index');
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
        $position = Position::findPosition($id);

        return view('manager_ktx.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePositionRequest $request, $id)
    {
        $success = Position::updatePosition($request->all(), $id);

        if ($success) {
            flash('Cập nhật thành công.')->success();
            return redirect()->route('positions.index');
        } else {
            flash( __('Cập nhật thất bại, vui lòng thử lại.'))->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\Position $position)
    {
        $position = Position::deletePosition($position);

        if (isset($position)) {           
            flash(__('Xóa thành công.'))->success();
        } else {
            flash( __('Xóa thất bại, vui lòng thử lại.'))->error();
        }

        return redirect()->route('positions.index');
    }
}
