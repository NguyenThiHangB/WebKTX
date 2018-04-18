<?php

namespace App\Http\Controllers\Ktx;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerktx\CreateRoomsRequest;
use App\Http\Requests\Managerktx\UpdateRoomsRequest;
use Illuminate\Http\Request;
use App\Models as Database;
use App\Models\Room;
use App\Models\Row;
use App\Models\TypeRoom;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = Row::getRow();
        $type_rooms = TypeRoom::getTypeRoom();
        $rooms = Room::getListRoom($request->all());

        return view('manager_ktx.rooms.index', compact('rows', 'type_rooms', 'rooms'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = Row::getRow();
        $type_rooms = TypeRoom::getTypeRoom();

        return view('manager_ktx.rooms.create', compact('rows', 'type_rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoomsRequest $request)
    {
        $room = Room::createRoom($request->all());

        if (isset($room)) {
            flash('Thêm phòng thành công.')->success();
            return redirect()->route('rooms.index');
        } else {
            flash('Thêm phòng thất bại, vui lòng thử lại.')->error();
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
        $rows = Row::getRow();
        $type_rooms = TypeRoom::getTypeRoom();
        $room = Room::findRoom($id);

        return view('manager_ktx.rooms.edit', compact('rows', 'type_rooms', 'room'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomsRequest $request, $id)
    {      
        $room = Room::updateRoom($request->all(), $id);

        if (isset($room)) {
            flash('Cập nhật phòng thành công.')->success();
            return redirect()->route('rooms.index');
        } else {
            flash('Cập nhật phòng thất bại, vui lòng thử lại.')->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Database\Room $room)
    {
        $room = Room::deleteRoom($room);

        if (isset($room)) {           
            flash(__('Xóa thành công.'))->success();
        } else {
            flash( __('Xóa thất bại, vui lòng thử lại.'))->error();
        }

        return redirect()->route('rooms.index');
    }
}
