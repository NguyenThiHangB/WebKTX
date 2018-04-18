<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerktx\CreateTypeRoomsRequest;
use App\Http\Requests\Managerktx\UpdateTypeRoomsRequest;
use Illuminate\Http\Request;
use App\Models as Database;
use App\Models\TypeRoom;

class TypeRoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typerooms = TypeRoom::getListTypeRoom();
        return view('manager_ktx.typerooms.index', compact('typerooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager_ktx.typerooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTypeRoomsRequest $request)
    {
        $typeroom = TypeRoom::createTypeRoom($request->all());

        if ($typeroom) {
            flash('Thêm loại phòng thành công.')->success();
            return redirect()->route('typerooms.index');
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
        $typeroom = TypeRoom::findTypeRoom($id);

        return view('manager_ktx.typerooms.edit', compact('typeroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRoomsRequest $request, $id)
    {
        $success = TypeRoom::updateTypeRoom($request->all(), $id);

        if ($success) {
            flash('Cập nhật loại phòng thành công.')->success();
            return redirect()->route('typerooms.index');
        } else {
            flash('Cập nhật bại, vui lòng thử lại')->error();
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $typeroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\TypeRoom $typeroom)
    {
        $typeroom = TypeRoom::deleteTypeRoom($typeroom);

        if (isset($typeroomy)) {           
            flash(__('Xóa thành công.'))->success();
        } else {
            flash( __('Xóa thất bại, vui lòng thử lại.'))->error();
        }

        return redirect()->route('typerooms.index');
    }
}
