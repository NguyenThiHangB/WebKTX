<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models as Database;

class TypeRoom extends Model
{
    use SoftDeletes;

    protected $table = 'type_rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'student_max',
        'price',
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
     * The get list TypeRooms.
     *
     * @author hangnt
     */
    public static function getListTypeRoom()
    {
        $typerooms = TypeRoom::get();
        return $typerooms;
    }

     /**
     * The get list name typerooom.
     *
     * @author hangnt
     */
    public static function getTypeRoom()
    {
        $typerooms = Database\TypeRoom::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        return $typerooms;
    }


    /**
     * Find TypeRoom.
     *
     * @param int $id
     * @return boolean
     * @author hangnt
     */
    public static function findTypeRoom(int $id)
    {
        $typeroom = TypeRoom::find($id);
        return $typeroom;
    }

    /**
     * Create typeroom.
     *
     * @param array $request
     * @return App\Models\TypeRoom $request
     * @author hangnt
     */
    public static function createTypeRoom($request)
    {
        return TypeRoom::create($request);
    }

    /**
     * Update TypeRoom.
     *
     * @param array $request
     * @param id int
     * @return boolean
     * @author hangnt
     */
    public static function updateTypeRoom($request, int $id)
    {
        return TypeRoom::find($id)->update($request);
    }

    /**
     * Delete TypeRoom.
     *
     * @param int $typeroom
     * @return boolean
     * @author hangnt
     */
    public static function deleteTypeRoom(Database\TypeRoom $typeroom)
    {
        return $typeroom->delete();
    }
}
