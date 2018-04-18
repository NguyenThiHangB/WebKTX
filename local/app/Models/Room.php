<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class Room extends Model
{
    use SoftDeletes;

    protected $table = 'rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'row_id',
        'type_room_id',
        'numnber_student_max',
        'numnber_student_present',
        'note',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    protected $perPage = 10;

    /**
     * Get the row that owns the room.
     */
    public function row()
    {
        return $this->belongsTo('App\Models\Row');
    }

    /**
     * Get the type_room that owns the room.
     */
    public function type_room()
    {
        return $this->belongsTo('App\Models\TypeRoom');
    }

    /**
     * The get list all name room.
     *
     * @author hangnt
     */
    public static function getNameRoom()
    {
        $rooms = Database\Room::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        return $rooms;
    }

    /**
     * The get list name empty room.
     *
     * @author hangnt
     */
    public static function getRoom()
    {
        $rooms = Room::whereRaw('numnber_student_max > numnber_student_present')->pluck('name', 'id')->all();;
        return $rooms;
    }

    /**
     * The get list room and search
     *
     * @author hangnt
     */
    public static function getListRoom($request)
    {
        $builder = Room::orderBy('name', 'ASC')->with('row', 'type_room');

        if (!empty($request['name'])) {
            $builder = $builder->where('name', 'like', '%' . $request['name']. '%');
        }
        if (!empty($request['row_id'])) {
            $builder = $builder->where('row_id', '=' , $request['row_id']);
        }
        if (!empty($request['type_room_id'])) {
            $builder = $builder->where('type_room_id', '=' , $request['type_room_id']);
        }
        return $builder->paginate();
    }

    /**
     * Find room.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findRoom(int $id)
    {
        $room = Room::find($id);
        return $room;
    }

    /**
     * Create room.
     *
     * @param array $request
     * @return App\Models\Room $request
     * @author hangnt
     */
    public static function createRoom($request)
    {
        return Room::create($request);
    }

    /**
     * Update room.
     *
     * @param array $request
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function updateRoom($request, int $id)
    {
        return Room::find($id)->update($request);
    }

    /**
     * Delete room.
     *
     * @param int $room
     * @return boolean
     * @author hangnt
     */
    public static function deleteRoom(Database\Room $room)
    {
        return $room->delete();
    }
}
